<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramUtama;
use App\Config;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'content' => 'frontend.home',
            'url' => 'home',
            'progutama' => ProgramUtama::limit(3)->get(),
            'config' => Config::orderBy('configId','asc')->first()
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
