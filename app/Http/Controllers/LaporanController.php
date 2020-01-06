<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use DB;

class LaporanController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Donasi Terkumpul',
            'content' => 'frontend.donasi',
            'url'     => 'donasi',
            'totalDonasi'  => Donasi::select(DB::raw('sum(donasiValue) as value'))->get(),
            'donasi' => Donasi::orderBy('donasiId','desc')->first()
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
