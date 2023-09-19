<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    public function index()
    {
        $total_evaluations = Evaluation::all()->count();
        $records = Evaluation::with('employees')->get();
        return view('evaluations.index', compact('total_evaluations', 'records'));
    }

    public function create()
    {
        return view('evaluations.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'file' => 'required|mimes:pdf,docx',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $check = Evaluation::where('name', $request->name)->first();

        if (isset($check)) {
            return back()->with('error', 'There is already a file with the same name on this location');
        }

        $fileName = Str::slug($request->name) . '.' . $request->file->extension();

        $request->file->move(public_path('assets/media/admin/evaluations'), $fileName);

        $path = 'assets/media/admin/evaluations/' . $fileName;

        Evaluation::create([
            'admin_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'path' => $path
        ]);

        return redirect()->route('evaluations.index')->with('success', 'Document uploaded successfully.');
    }

    public function destroy(Evaluation $evaluation){

        $evaluation->delete();

        return back()->with('success','Deleted Succesfully');
        
    }
}
