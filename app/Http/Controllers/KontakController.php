<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Kontak Kami',
            'content' => 'frontend.kontak',
            'url'     => 'profil',
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
