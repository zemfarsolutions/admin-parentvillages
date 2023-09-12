<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserApplication;
use Illuminate\Http\Request;

class AppliedScholarships extends Controller
{
    public function index(){
        $records = UserApplication::with('user','scholarship')->orderBy('id', 'DESC')->get();
        return $records;
    }
}