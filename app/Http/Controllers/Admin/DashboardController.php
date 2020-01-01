<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Dashboard YADIA Admin',
            'content' => 'admin.dashboard',
            'parentActive' => 'dashboard',
        ];

        return view('admin.layout.index',['data' => $data]);
    }
}