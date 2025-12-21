<?php
namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\District;
use Illuminate\Http\Request;

class ClanController extends Controller
{
   public function index(Request $request)
    {
        $clans = Clan::with('district')
            ->when($request->search, function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            })
            ->paginate(10);

        $districts = District::all();

        return view('clans.index', compact('clans', 'districts'));
    }

    public function create()
    {
        $districts = District::all();
        return view('clans.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'district_id' => 'required|exists:districts,id'
        ]);

        Clan::create($validated);
        return redirect()->route('clans.index')->with('success', 'Clan created successfully');
    }

    public function edit(Clan $clan)
    {
        $districts = District::all();
        return view('clans.edit', compact('clan', 'districts'));
    }

    public function update(Request $request, Clan $clan)
    {
        $validated = $request->validate([
            'name' => 'required',
            'district_id' => 'required|exists:districts,id'
        ]);

        $clan->update($validated);
        return redirect()->route('clans.index')->with('success', 'Clan updated successfully');
    }

    public function destroy(Clan $clan)
    {
        $clan->delete();
        return redirect()->route('clans.index')->with('success', 'Clan deleted successfully');
    }

     /**
     * AJAX: Get clans by district
     */
    public function getByDistrict($districtId)
    {
        try {
            $clans = Clan::where('district_id', $districtId)
                ->select('id', 'name')
                ->orderBy('name')
                ->get();

            return response()->json($clans);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to load clans',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
