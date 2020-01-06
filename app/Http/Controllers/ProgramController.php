<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramUtama;

class ProgramController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Program & Kegiatan',
            'content' => 'frontend.program',
            'url'     => 'program',
            'progutama' => ProgramUtama::all()
        ];

        return view('frontend.layout.index',['data' => $data]);
    }
}
