<?php
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
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::with(['district', 'clan', 'town']);

        // APPLY FILTERS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        if ($request->filled('clan_id')) {
            $query->where('clan_id', $request->clan_id);
        }

        if ($request->filled('town_id')) {
            $query->where('town_id', $request->town_id);
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->boolean('first_time_voter')) {
            // First-time voter logic:
            // Age in Oct 2023 < 18 AND Age in Oct 2029 >= 18 AND Age in Oct 2029 < 23
            $query->whereRaw('age_2023 < 18 AND age_2029 >= 18 AND age_2029 <= 23');
        }

        // EXPORT (NO PAGINATION)
        if ($request->filled('export')) {
            $members = (clone $query)->orderBy('district_id')->orderBy('town_id')->get();

            $filters = $this->buildFilters($request);
            $title = $this->buildTitle($filters);

            return $this->export($request->export, $members, $filters, $title);
        }

        // UI PAGINATION
        $members = $query->orderBy('id')->paginate(20)->withQueryString();
        $districts = District::all();
        $towns = Town::all();
        $clans = Clan::all();

        return view('members.index', compact('members', 'districts', 'towns', 'clans'));
    }

    private function buildFilters(Request $request): array
    {
        return [
            'district' => $request->filled('district_id') ? District::find($request->district_id)?->name : null,
            'clan' => $request->filled('clan_id') ? Clan::find($request->clan_id)?->name : null,
            'town' => $request->filled('town_id') ? Town::find($request->town_id)?->name : null,
        ];
    }

    private function buildTitle(array $filters): string
    {
        $parts = [];

        foreach ($filters as $key => $value) {
            if ($value) {
                $parts[] = ucfirst($key) . ': ' . $value;
            }
        }

        return $parts ? 'Members Report – ' . implode(' | ', $parts) : 'Members Report – All Records';
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
        $validated['age_2023'] = Member::calculateAge($validated['date_of_birth'], 2023);
        $validated['age_2029'] = Member::calculateAge($validated['date_of_birth'], 2029);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('member'), $imageName);
            $validated['photo'] = "member/$imageName";
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
            'email' => 'nullable|email|unique:members,email,' . $member->id,
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
        $validated['age_2023'] = Member::calculateAge($validated['date_of_birth'], 2023);
        $validated['age_2029'] = Member::calculateAge($validated['date_of_birth'], 2029);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($member->photo) {
                $filePath = public_path($member->photo);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
            $imageName = time() . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('member'), $imageName);
            $validated['photo'] = "member/$imageName";
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

    private function export(string $type, $members, array $filters, string $title)
    {
        // GROUP BY DISTRICT → TOWN
        $grouped = $members->groupBy([fn($m) => $m->district->name ?? 'Unknown District', fn($m) => $m->town->name ?? 'Unknown Town']);

        if ($type === 'pdf') {
            return Pdf::loadView('members.pdf', [
                'grouped' => $grouped,
                'filters' => $filters,
                'title' => $title,
                'total' => $members->count(),
            ])
                ->setPaper('a4', 'landscape')
                ->download('members_report.pdf');
        }

        if ($type === 'csv') {
            return $this->exportCsv($members, $filters, $title);
        }
    }

    private function exportCsv($members, array $filters, string $title)
    {
        $filename = 'members_' . now()->format('Y-m-d') . '.csv';

        return response()->stream(
            function () use ($members, $filters, $title) {
                $file = fopen('php://output', 'w');

                // TITLE
                fputcsv($file, [$title]);
                fputcsv($file, []);

                // FILTER SUMMARY
                fputcsv($file, ['Applied Filters']);
                foreach ($filters as $key => $value) {
                    if ($value) {
                        fputcsv($file, [ucfirst($key), $value]);
                    }
                }

                fputcsv($file, []);
                fputcsv($file, ['Total Members', $members->count()]);
                fputcsv($file, []);

                // HEADERS
                fputcsv($file, ['ID', 'Name', 'Phone', 'Gender', 'Age', 'Age 2023', 'Age 2029', 'District', 'Clan', 'Town', 'Status']);

                foreach ($members as $m) {
                    fputcsv($file, [$m->id, $m->full_name, $m->phone_primary, ucfirst($m->gender), $m->current_age, $m->age_2023, $m->age_2029, $m->district->name ?? '', $m->clan->name ?? '', $m->town->name ?? '', $m->status]);
                }

                fclose($file);
            },
            200,
            [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=$filename",
            ],
        );
    }

    public function checkDuplicate(Request $request)
    {
        $exists = Member::where('email', $request->email)->orWhere('phone_primary', $request->phone)->exists();

        return response()->json(['exists' => $exists]);
    }
}