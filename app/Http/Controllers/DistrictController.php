<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use Barryvdh\DomPDF\Facade\Pdf;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $districts = District::withCount(['clans', 'towns', 'members'])->paginate(15);

        if ($request->has('export')) {
            return $this->export($request->export);
        }

        return view('districts.index', compact('districts'));
    }

    public function create()
    {
        return view('districts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        District::create($validated);
        return redirect()->route('districts.index')->with('success', 'District created successfully');
    }

    public function edit(District $district)
    {
        return view('districts.edit', compact('district'));
    }

    public function update(Request $request, District $district)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $district->update($validated);
        return redirect()->route('districts.index')->with('success', 'District updated successfully');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->route('districts.index')->with('success', 'District deleted successfully');
    }

    private function export($type)
    {
        $districts = District::withCount(['clans', 'towns', 'members'])->get();

        if ($type === 'pdf') {
            $pdf = Pdf::loadView('districts.pdf', compact('districts'));
            return $pdf->download('districts.pdf');
        }

        if ($type === 'csv') {
            $filename = 'districts_' . date('Y-m-d') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=$filename",
            ];

            $callback = function () use ($districts) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Code', 'Name', 'Description', 'Clans', 'Towns', 'Members']);
                foreach ($districts as $district) {
                    fputcsv($file, [$district->code, $district->name, $district->description, $district->clans_count, $district->towns_count, $district->members_count]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }
    }
}
