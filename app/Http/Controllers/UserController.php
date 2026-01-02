<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')->paginate(15);

        if ($request->has('export')) {
            return $this->export($request->export);
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'mid_name' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'phone' => 'nullable',
            'password' => 'required|min:8|confirmed',
            'status' => 'required|in:active,inactive',
            'avatar' => 'nullable|image|max:2048',
            'roles' => 'required|array',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $imageName = time().'.'.$request->file('avatar')->extension();
             $request->file('avatar')->move(public_path('avatars'),
             $imageName);
             $validated['avatar'] = "avatars/$imageName";
        }

        $user = User::create($validated);
        $user->assignRole($request->roles);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'mid_name' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|unique:users,username,' . $user->id,
            'phone' => 'nullable',
            'password' => 'nullable|min:8|confirmed',
            'status' => 'required|in:active,inactive',
            'avatar' => 'nullable|image|max:2048',
            'roles' => 'required|array',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
               $filePath = public_path($request->avatars);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            }
            $imageName = time().'.'.$request->file('avatar')->extension();
             $request->file('avatar')->move(public_path('avatars'), 
            $imageName);
            $validated['avatar'] = "avatars/$imageName";
        }

        $user->update($validated);
        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function destroy(User $user)
    {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    private function export($type)
    {
        $users = User::with('roles')->get();

        if ($type === 'pdf') {
            $pdf = Pdf::loadView('users.pdf', compact('users'));
            return $pdf->download('users.pdf');
        }

        if ($type === 'csv') {
            $filename = 'users_' . date('Y-m-d') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=$filename",
            ];

            $callback = function () use ($users) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Email', 'Username', 'Phone', 'Status', 'Roles']);
                foreach ($users as $user) {
                    fputcsv($file, [$user->name, $user->email, $user->username, $user->phone, $user->status, $user->roles->pluck('name')->join(', ')]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }
    }
}
