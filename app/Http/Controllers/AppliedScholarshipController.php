<?php

namespace App\Http\Controllers;

use App\Models\UserApplication;
use Illuminate\Http\Request;

class AppliedScholarshipController extends Controller
{
    public function index(){
        $total_applicants = UserApplication::all()->count();

        $records = UserApplication::all();
        
        return view('applied_scholarships.index', compact('total_applicants', 'records'));
    }

    public function show(UserApplication $userapplication){
        // dd($userapplication->guardians);
        // $records =UserApplication::with('user','guardians','references')->get()->toArray();
        return view('applied_scholarships.view', compact('userapplication'));
    }
}
