<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;

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
        return view('admin.photo-edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    // Find the photo by ID
    $photo = Photo::findOrFail($id);

    // Validate input fields
    $request->validate([
        'category' => 'required|exists:categories,id',
        'photo_name' => 'nullable|mimes:jpeg,png,jpg|max:5000' // Optional image upload
    ]);

    // Update category
    $photo->category = $request->category;

    // Check if a new image is uploaded
    if ($request->hasFile('photo_name')) {
        // Store the new image
        $uploadedPhoto = $request->file('photo_name');
        $photoPath = $uploadedPhoto->store('uploads', 'public');

        // Delete the old image if it exists
        if ($photo->photo) {
            Storage::disk('public')->delete($photo->photo);
        }

        // Update photo path
        $photo->photo = $photoPath;
    }

    // Save the changes
    $photo->save();

    // Redirect back with success message
    return redirect()->route('photo.index')->with('success', 'Photo updated successfully!');
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
