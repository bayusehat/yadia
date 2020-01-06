<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Gallery',
            'content' => 'frontend.gallery',
            'url'     => 'gallery',
            'gallery' => Gallery::all()
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
