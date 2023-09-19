<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index(){
        $total_admins = Admin::all()->count();

        $records = Admin::all();
        return view('admins.index',compact('total_admins','records'));
    }

    public function create(){
        return view('admins.create');
    }

    public function store(Request $request,Admin $admin){
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'email' => 'required'
            ],
            [
                'password.regex' => 'Password Must Containe One Upercase alphabet letter, One Small alphabet letter , One Special character , atlest 8 characters long',
            ]
        );
        if ($validated->fails()) {
            return back()
            ->withErrors($validated)
            ->withInput();
        }
        $attributes=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $admin->create($attributes);
        return back()->with('success','Admin has been created');
    }

    public function view(Admin $admin){
        return view('admins.view', compact('admin'));
    }

    public function edit(Admin $admin){
        return view('admins.edit', compact('admin'));
    }

    public function update(Admin $admin , Request $request){
        
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required'
            ],
        );
        if ($validated->fails()) {
            return back()
            ->withErrors($validated)
            ->withInput();
        }
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy(Admin $admin){
        $admin->delete();
        return redirect()->route('admins.index')->with('success','Deleted Successfully');
    }
}
