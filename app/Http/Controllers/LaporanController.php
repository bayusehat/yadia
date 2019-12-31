<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Laporan Keuangan',
            'content' => 'frontend.laporan',
            'url'     => 'laporan',
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
