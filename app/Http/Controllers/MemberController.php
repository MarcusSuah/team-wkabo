<?php
// app/Http/Controllers/MemberController.php
namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\District;
use App\Models\Clan;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\MembershipStatusMail;
use Barryvdh\DomPDF\Facade\Pdf;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::with(['district', 'clan', 'town']);

        // Filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        if ($request->filled('first_time_voter')) {
            $query->whereRaw('current_age < 18 AND age_2029 >= 18');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $members = $query->paginate(15);
        $districts = District::all();

        if ($request->has('export')) {
            return $this->export($request->export, $query->get());
        }

        return view('members.index', compact('members', 'districts'));
    }

    public function create()
    {
        $districts = District::all();
        return view('members.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'mid_name' => 'nullable',
            'last_name' => 'required',
            'phone_primary' => 'required',
            'phone_secondary' => 'nullable',
            'email' => 'required|email|unique:members',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'district_id' => 'required|exists:districts,id',
            'clan_id' => 'required|exists:clans,id',
            'town_id' => 'required|exists:towns,id',
            'current_residence' => 'required',
            'voting_precinct_2029' => 'nullable',
            'occupation' => 'nullable',
            'whatsapp_primary' => 'nullable',
            'whatsapp_secondary' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'prior_political_involvement' => 'nullable',
            'reasons_for_joining' => 'nullable',
            'willing_to_volunteer' => 'required|in:Yes,No,Maybe',
            'willing_to_lead' => 'required|in:Yes,No,Maybe',
            'preferred_contributions' => 'nullable|array',
            'declaration_accepted' => 'required|accepted',
        ]);

        // Calculate ages
        $validated['current_age'] = Member::calculateAge($validated['date_of_birth']);
        $validated['age_2029'] = Member::calculateAge($validated['date_of_birth'], 2029);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('members', 'public');
        }

        if (is_array($request->preferred_contributions)) {
            $validated['preferred_contributions'] = implode(', ', $request->preferred_contributions);
        }

        Member::create($validated);
        return redirect()->route('members.index')->with('success', 'Member registered successfully');
    }

    public function edit(Member $member)
    {
        $districts = District::all();
        $clans = Clan::where('district_id', $member->district_id)->get();
        $towns = Town::where('clan_id', $member->clan_id)->get();
        return view('members.edit', compact('member', 'districts', 'clans', 'towns'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'mid_name' => 'nullable',
            'last_name' => 'required',
            'phone_primary' => 'required',
            'phone_secondary' => 'nullable',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'district_id' => 'required|exists:districts,id',
            'clan_id' => 'required|exists:clans,id',
            'town_id' => 'required|exists:towns,id',
            'current_residence' => 'required',
            'voting_precinct_2029' => 'nullable',
            'occupation' => 'nullable',
            'whatsapp_primary' => 'nullable',
            'whatsapp_secondary' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'prior_political_involvement' => 'nullable',
            'reasons_for_joining' => 'nullable',
            'willing_to_volunteer' => 'required|in:Yes,No,Maybe',
            'willing_to_lead' => 'required|in:Yes,No,Maybe',
            'preferred_contributions' => 'nullable|array',
            'declaration_accepted' => 'nullable',
        ]);

        // Recalculate ages
        $validated['current_age'] = Member::calculateAge($validated['date_of_birth']);
        $validated['age_2029'] = Member::calculateAge($validated['date_of_birth'], 2029);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $validated['photo'] = $request->file('photo')->store('members', 'public');
        }

        if (is_array($request->preferred_contributions)) {
            $validated['preferred_contributions'] = implode(', ', $request->preferred_contributions);
        }

        $member->update($validated);
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function show($id)
    {
        $member = Member::with(['district', 'clan', 'town'])->findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }

    public function updateStatus(Request $request, Member $member)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $member->update($validated);

        // Send email notification
        Mail::to($member->email)->send(new MembershipStatusMail($member));

        return redirect()->back()->with('success', 'Status updated and email sent');
    }

    private function export($type, $members)
    {
        if ($type === 'pdf') {
            $pdf = Pdf::loadView('members.pdf', compact('members'));
            return $pdf->download('members.pdf');
        }

        if ($type === 'csv') {
            $filename = 'members_' . date('Y-m-d') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=$filename",
            ];

            $callback = function () use ($members) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Email', 'Phone', 'Gender', 'Age', 'Age 2029', 'District', 'Clan', 'Town', 'Status']);
                foreach ($members as $member) {
                    fputcsv($file, [$member->full_name, $member->email, $member->phone_primary, $member->gender, $member->current_age, $member->age_2029, $member->district->name, $member->clan->name, $member->town->name, $member->status]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }
    }

    public function checkDuplicate(Request $request)
    {
        $exists = Member::where('email', $request->email)->orWhere('phone_primary', $request->phone)->exists();

        return response()->json(['exists' => $exists]);
    }
}
