<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    public function index()
    {
        $records = Resource::with('reviews')->get();
        return view('resources.index', compact('records'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required',
        ]);

        $check = Resource::where('name', $request->name)->first();

        if (isset($check)) {
            return back()->with('error', 'There is already a file with the same name on this location');
        }

        $fileName = Str::slug($request->name) . '.' . $request->file->extension();

        $request->file->move(public_path('admin/resources'), $fileName);

        $path = '/admin/resources/' . $fileName;

        Resource::create([
            'admin_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'path' => $path
        ]);

        return redirect()->route('documents.index')->with('success', 'Resource uploaded successfully.');
    }

    public function show(Resource $document)
    {
        return view('resources.view', compact('document'));
    }

    public function destroy(Resource $document)
    {
        $document->reviews()->delete();
        $document->delete();

        return redirect()->route('documents.index')->with('error', 'Resource deleted successfully.');
    }

    public function showCreateForm(Resource $document)
    {
        $users = User::all();
        $id = $document->id;
        return view('resources.create-review', compact('users', 'id'));
    }

    public function storeReview(Request $request)
    {
        UserResource::create([
            'user_id' => $request->user_id,
            'resource_id' => $request->resource_id,
            'description' => $request->description
        ]);

        return back()->with('success', 'Review added successfully.');
    }

    public function destroyReview(UserResource $review)
    {
        $review->delete();

        return back()->with('error', 'Review deleted successfully.');
    }
}