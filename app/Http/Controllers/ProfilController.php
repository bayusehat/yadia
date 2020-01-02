<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;

class ProfilController extends Controller
{
    public function index($slug)
    {
        $profil = Profil::where('profilSlug',$slug)->first();
        $data = [
            'title'   => $profil->profilName,
            'content' => 'frontend.profil',
            'url'     => 'profil',
            'profil'  => $profil 
        ];

        return view('frontend.layout.index',['data' => $data]);
    }
}
