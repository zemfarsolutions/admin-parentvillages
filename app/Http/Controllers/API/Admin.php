<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin as ModelsAdmin;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index(ModelsAdmin  $modelAdmin){
        $admin = ModelsAdmin::all();
        return $admin;
    }
}
