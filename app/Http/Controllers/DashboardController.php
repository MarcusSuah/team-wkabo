<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\District;
use App\Models\Clan;
use App\Models\Town;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return $this->admin();
        } elseif ($user->hasRole('manager')) {
            return $this->manager();
        }

        // Default dashboard for users without specific roles
        return redirect()->route('home');
    }

    public function admin()
    {
        $stats = [
            'total_members' => Member::count(),
            'pending_members' => Member::where('status', 'pending')->count(),
            'approved_members' => Member::where('status', 'approved')->count(),
            'rejected_members' => Member::where('status', 'rejected')->count(),
            'total_districts' => District::count(),
            'total_clans' => Clan::count(),
            'total_towns' => Town::count(),
            'first_time_voters' => Member::where('age_2023', '<', 18)
                ->where('age_2029', '>=', 18)
                ->where('age_2029', '<', 23)
                ->count(),
        ];

        // Basic Statistics
        $totalMembers = Member::count();
        $newMembersLast30Days = Member::where('created_at', '>=', now()->subDays(30))->count();
        $previousMembers = $totalMembers - $newMembersLast30Days;
        $memberGrowthPercent = $previousMembers > 0 ? round(($newMembersLast30Days / $previousMembers) * 100, 1) : ($totalMembers > 0 ? 100 : 0);

        // Districts
        $totalDistricts = District::count();
        $districts = District::withCount('members')->get();

        // Clans (max 6)
        $registeredClans = Clan::count();
        $clanPercentage = 6 > 0 ? round(($registeredClans / 6) * 100, 1) : 0;
        $clans = Clan::withCount('members')->orderBy('members_count', 'desc')->get();

        // Towns (max 50)
        $registeredTowns = Town::count();
        $townGrowthPercent = 50 > 0 ? round(($registeredTowns / 50) * 100, 1) : 0;
        $towns = Town::withCount('members')->orderBy('members_count', 'desc')->get();

        // Gender breakdown
        $genderData = Member::select('gender', DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->get();

        // District breakdown
        $districtData = Member::select('districts.name', DB::raw('count(*) as count'))
            ->join('districts', 'members.district_id', '=', 'districts.id')
            ->groupBy('districts.name')
            ->orderBy('count', 'desc')
            ->get();

        // WhatsApp Statistics
        $whatsappCount = Member::where('whatsapp_primary', true)
            ->orWhere('whatsapp_secondary', true)
            ->count();

        // Occupation Statistics
        $occupationStats = Member::selectRaw('occupation, COUNT(*) as count')
            ->whereNotNull('occupation')
            ->groupBy('occupation')
            ->orderByRaw('count DESC')
            ->limit(10)
            ->get();

        // Age groups
        $ageGroups = [
            '15-17' => Member::whereBetween('current_age', [15, 17])->count(),
            '18-25' => Member::whereBetween('current_age', [18, 25])->count(),
            '26-35' => Member::whereBetween('current_age', [26, 35])->count(),
            '36-45' => Member::whereBetween('current_age', [36, 45])->count(),
            '46-55' => Member::whereBetween('current_age', [46, 55])->count(),
            '56+' => Member::where('current_age', '>', 55)->count(),
        ];

        // Monthly registration trend (Last 12 months)
        $monthlyRegistrations = collect();
        
        for ($i = 11; $i >= 0; $i--) {
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();
            
            $count = Member::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            
            $monthlyRegistrations->push([
                'month' => $startOfMonth->format('M Y'),
                'count' => $count
            ]);
        }

        // Volunteer statistics
        $volunteerStats = [
            'willing_to_volunteer' => Member::where('willing_to_volunteer', 'Yes')->count(),
            'willing_to_lead' => Member::where('willing_to_lead', 'Yes')->count(),
        ];

        return view('dashboards.admin', compact(
            'totalMembers',
            'clans',
            'stats',
            'whatsappCount',
            'occupationStats',
            'genderData',
            'districtData',
            'ageGroups',
            'registeredClans',
            'registeredTowns',
            'towns',
            'monthlyRegistrations',
            'volunteerStats',
            'totalDistricts',
            'districts'
        ));
    }

    public function manager()
    {
        $stats = [
            'total_members' => Member::count(),
            'pending_members' => Member::where('status', 'pending')->count(),
            'approved_members' => Member::where('status', 'approved')->count(),
            'rejected_members' => Member::where('status', 'rejected')->count(),
            'total_districts' => District::count(),
            'total_towns' => Town::count(),
        ];

        $recentMembers = Member::with(['district', 'clan', 'town'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboards.manager', compact('stats', 'recentMembers'));
    }
}