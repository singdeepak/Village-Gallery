<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('admin.photo-index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photo-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:categories,id',
            'photo_name' => 'required|mimes:jpeg,png,jpg|max:5000'
        ]);

        $photo = $request->file('photo_name');
        $photoPath = $photo->store('uploads', 'public');
        
        Photo::create([
            'photo' => $photoPath,
            'category_id' => $request->category
        ]);
        return redirect()->route('photo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = Photo::findOrFail($id);
        $categories = Category::get();
        return view('admin.photo-edit', compact('photo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $photo = Photo::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'photo_name' => 'nullable|mimes:jpeg,png,jpg|max:5000'
        ]);

        $photo->category_id = $request->category_id;

        if ($request->hasFile('photo_name')) {
            $uploadedPhoto = $request->file('photo_name');
            $photoPath = $uploadedPhoto->store('uploads', 'public');

            if ($photo->photo) {
                Storage::disk('public')->delete($photo->photo);
            }

            $photo->photo = $photoPath;
        }

        $photo->save();

        return redirect()->route('photo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return redirect()->route('photo.index');
    }
}
