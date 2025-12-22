<?php
namespace App\Http\Controllers;
use App\Models\Town;
use App\Models\Clan;
use App\Models\District;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TownExport;
use Barryvdh\DomPDF\Facade\Pdf;

class TownController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role_or_permission:admin|manage-towns');
    // }

    /**
     * Display a listing of towns
     */
    public function index(Request $request)
    {
        // Fetch towns with related clan, district, and members count
        $towns = Town::with(['clan', 'district', 'members'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%");
            })
            ->paginate(15);

        // Fetch all districts and clans
        $districts = District::all();
        $clans = Clan::all();

        // Prepare $clansData for JS: group clans by district_id
        $clansData = [];
        foreach ($clans as $clan) {
            $clansData[$clan->district_id][] = [
                'id' => $clan->id,
                'name' => $clan->name,
            ];
        }

        return view('towns.index', compact('towns', 'districts', 'clans', 'clansData'));
    }

    /**
     * Show the form for creating a new town (not used with modals)
     */
    public function create()
    {
        return response()->json(['message' => 'Use modal for creation']);
    }

    /**
     * Store a newly created town in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'clan_id' => 'required|exists:clans,id',
            'district_id' => 'required|exists:districts,id',
        ]);

        Town::create($validated);

        return redirect()->route('towns.index')->with('success', 'Town created successfully!');
    }

    /**
     * Display the specified town
     */
    public function show(Town $town)
    {
        $town->load(['clan', 'district', 'members']);
        return view('towns.show', compact('town'));
    }

    /**
     * Show the form for editing the specified town (not used with modals)
     */
    public function edit(Town $town)
    {
        return response()->json($town);
    }

    /**
     * Update the specified town in storage
     */
    public function update(Request $request, Town $town)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'clan_id' => 'required|exists:clans,id',
            'district_id' => 'required|exists:districts,id',
        ]);

        $town->update($validated);

        return redirect()->route('towns.index')->with('success', 'Town updated successfully!');
    }

    /**
     * Remove the specified town from storage
     */
    public function destroy(Town $town)
    {
        $townName = $town->name;
        $town->delete();

        return redirect()
            ->route('towns.index')
            ->with('success', "Town '{$townName}' deleted successfully!");
    }

    /**
     * Print towns
     */
    public function print()
    {
        $towns = Town::with(['clan', 'district'])->get();
        return view('towns.print', compact('towns'));
    }

    /**
     * Export towns to PDF
     */
    public function exportPdf()
    {
        $towns = Town::with(['clan', 'district'])->get();
        $pdf = Pdf::loadView('towns.pdf', compact('towns'));
        return $pdf->download('towns.pdf');
    }

    /**
     * Export towns to CSV
     */
    public function exportCsv()
    {
        return Excel::download(new TownExport(), 'towns.csv');
    }

    /**
     * AJAX: Get towns by district
     */
    public function getByDistrict($districtId)
    {
        try {
            $towns = Town::where('district_id', $districtId)->select('id', 'name')->orderBy('name')->get();

            return response()->json($towns);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => 'Failed to load towns',
                    'message' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    /**
     * AJAX: Get towns by clan
     */
    public function getByClan($clanId)
    {
        try {
            $towns = Town::where('clan_id', $clanId)->select('id', 'name')->orderBy('name')->get();

            return response()->json($towns);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => 'Failed to load towns',
                    'message' => $e->getMessage(),
                ],
                500,
            );
        }
    }
}
