<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EmployeeMileageLog;
use Illuminate\Http\Request;
use Carbon\Carbon;


class MileageLog extends Controller
{
    public function index()
    {
        $records = EmployeeMileageLog::with(['employee' => function ($query) {
            $query->select('id', 'name')->get();
        }])->get();

        return $records;
    }

    public function milage_chart()
    {

        $records = EmployeeMileageLog::orderBy('date', 'asc')->get();
        dd($records);
        $total_hours = [];
        $months = [];
        $data = [];

        foreach ($records as $record) {

            $date = Carbon::createFromFormat('Y-m-d', $record->date);

            if (!in_array($date->format('F'), $months)) {

                $num_of_hours = EmployeeMileageLog::select('number_of_miles')
                    ->whereMonth('date', (int)$date->format('m'))
                    ->get()
                    ->pluck('number_of_miles')
                    ->toArray();

                array_push($total_hours, array_sum($num_of_hours));

                array_push($months, $date->format('F'));
            }
        }

        $data['miles'] = $total_hours;
        $data['months'] = $months;

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}