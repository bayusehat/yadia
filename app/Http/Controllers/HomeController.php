<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramUtama;
use App\Config;
use App\News;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'content' => 'frontend.home',
            'url' => 'home',
            'progutama' => ProgramUtama::limit(3)->get(),
            'config' => Config::orderBy('configId','asc')->first(),
            'news' => News::join('news_categories','news_categories.newsCategoryId','=','news.newsCategoryId')
                            ->join('admins','admins.adminId','=','news.adminId')
                            ->limit(3)
                            ->get()
        ];

        return view('frontend.layout.index', ['data' => $data]);
    }
}
