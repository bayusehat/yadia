<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;

class SettingController extends Controller
{
    public function index()
    {
        $id = session('adminId');
        
        $data = [
            'title' => 'Halaman Ganti Password',
            'content' => 'admin.setting',
            'parentActive' => '',
            'urlActive' => '',
            'setting' => Admin::where('adminId',$id)->first()
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function update(Request $request)
    {
        $rules = [
            'adminPasswordNew' => 'required',
            'adminPasswordConfirm' => 'required|same:adminPasswordNew'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $data = [
                'adminPassword' => Hash::make($request->input('adminPasswordCheck'))
            ];
            
            $insert = Admin::where('adminId',session('adminId'))->update($data);

            if($insert){
                return redirect()->back()->with('success','Berhasil mengganti password!');
            }else{
                return redirect()->back()->with('error','Gagal mengganti password!');
            }
        }
    }
}