<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScholarshipController extends Controller
{
    public function index()
    {
        $total_scholarships = Scholarship::all()->count();
        $records = Scholarship::all();

        return view('scholarships.index', compact('total_scholarships', 'records'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'link' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // UserAppointment::create([
        //     'user_id' => $request->user_id,
        //     'link' => $request->link
        // ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment added successfully.');
    }

    public function edit()
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'link' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // $appointment->update([
        //     'user_id' => $request->user_id,
        //     'link' => $request->link
        // ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy()
    {
        // $appointment->delete();

        return redirect()->route('appointments.index')->with('error', 'Appointment deleted successfully.');
    }
}
