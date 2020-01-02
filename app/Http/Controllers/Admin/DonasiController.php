<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\Donasi;

class DonasiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Donasi',
            'content' => 'admin.donasi',
            'parentActive' => 'fitur',
            'urlActive' => 'donasi',
            'donasi' => Donasi::all()
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function insert(Request $request)
    {
        $rules = [
            'donasiValue' => 'required|numeric',
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $insert = Donasi::insert([
                'adminId' => session('adminId'),
                'donasiValue' => $request->input('donasiValue'),
                'donasiCreate' => date('Y-m-d H:i:s'),
                'donasiUpdate' => date('Y-m-d H:i:s')
            ]);

            if($insert){
                return redirect()->back()->with('success','Berhasil menambah data Donasi!');
            }else{
                return redirect()->back()->with('error','Gagal menambah data Donasi!');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'donasiValue' => 'required|numeric',
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $insert = Donasi::where('donasiId',$id)->update([
                'adminId' => session('adminId'),
                'donasiValue' => $request->input('donasiValue'),
                'donasiUpdate' => date('Y-m-d H:i:s')
            ]);

            if($insert){
                return redirect()->back()->with('success','Berhasil memperbarui data Donasi!');
            }else{
                return redirect()->back()->with('error','Gagal memperbarui data Donasi!');
            }
        }
    }
}