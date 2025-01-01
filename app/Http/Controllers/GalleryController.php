<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function showPhotos(){
        $photos = Photo::latest()->get();
        return view('gallery.index', compact('photos'));
    }
}
