<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Profil',
            'content' => 'frontend.profil',
            'url'     => 'profil',
        ];

        return view('frontend.layout.index',['data' => $data]);
    }
}
