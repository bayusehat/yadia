<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
       $username = $request->input('adminUsername');
       $password = $request->input('adminPassword');

       $rules = [
           'adminUsername' => 'required',
           'adminPassword' => 'required'
       ];

       $isValid = Validator::make($request->all(), $rules);

       if($isValid->fails()){
           return redirect()->back()->withErrors($isValid->errors());
       }else{
           $check = Admin::where('adminUsername', $username);
           if($check->count() > 0){
               $data = $check->first();
               if($data){
                   if(Hash::check($password, $data->adminPassword)){
                       session([
                           'adminId' => $data->adminId,
                           'adminName' => $data->adminName,
                           'token' => Str::random(100),
                           'roleId' => $data->roleId
                       ]);

                       return redirect('/dashboard');
                   }else{
                       return redirect()->back()->with('error','Password yang anda masukan salah!');
                   }
               }else{
                    return redirect()->back()->with('error','User erorr');
               }
           }else{
                return redirect()->back()->with('error','User tidak ditemukan');
           }
       }
    }

    public function doLogout()
    {
        $updateLastLogin = Admin::where('adminId',session('adminId'))->update([
            'adminLastLogin' => date('Y-m-d H:i:s')
        ]);

        session()->flush();
        return redirect('/login');
    }
}