<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'content' => 'frontend.home',
            'url' => 'home',
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
