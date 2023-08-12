<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Client extends Controller
{
    public function index()
    {
        $records = User::all();

        return $records;
    }
}
