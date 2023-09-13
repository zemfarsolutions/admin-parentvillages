<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Intake;
use Illuminate\Http\Request;

class IntakeController extends Controller
{
    public function index()
    {
        $records = Intake::with('user')->orderBy('id', 'DESC')->get();

        return $records;
    }

    public function limitedIntakes(){
        $records = Intake::with('user')->orderBy('created_at', 'DESC')
                            ->offset(0)
                            ->limit(3)
                            ->get();

        return $records;
    }

}
