<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class HomeController extends Controller
{
    public function index()
    {
        // $totalMembers = Member::all();
        $totalMale = Member::where('gender', 'male')->count();
        $totalFemale = Member::where('gender', 'female')->count();

        return view('home', compact(
            'totalMembers',
            'totalMale',
            'totalFemale'
        ));
    }
}
