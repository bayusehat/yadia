<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Program & Kegiatan',
            'content' => 'frontend.program',
            'url'     => 'program'
        ];

        return view('frontend.layout.index',['data' => $data]);
    }
}
