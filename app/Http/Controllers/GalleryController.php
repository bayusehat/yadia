<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Gallery',
            'content' => 'frontend.gallery',
            'url'     => 'gallery',
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
