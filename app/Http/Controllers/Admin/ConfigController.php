<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\Config;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::orderBy('configId','asc')->first();
        $data = [
            'title'        => 'Halaman Konfigurasi',
            'content'      => 'admin.config',
            'parentActive' => 'pengaturan',
            'urlActive'    => 'config',
            'config'       => $config
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function insert(Request $request)
    {
        $rules = [
            'configWebName' => 'required',
            'configMission' => 'required',
            'configAddress' => 'required',
            'configTelephone' => 'required',
            'configEmail' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $data = [
                'configWebName' => $request->input('configWebName'),
                'configMission' => $request->input('configMission'),
                'configAddress' => $request->input('configAddress'),
                'configTelephone' => $request->input('configTelephone'),
                'configEmail'=> $request->input('configEmail'),
                'configCreate' => date('Y-m-d H:i:s'),
                'configUpdate' => date('Y-m-d H:i:s')
            ];
            $config = Config::orderBy('configId','asc')->first();
            if($config){
                $insert = Config::where('configId',$config->configId)->update($data);
            }else{
                $insert = Config::insert($data);
            }
            
            if($insert){
                return redirect()->back()->with('success','Berhasil memperbarui data Konfigurasi!');
            }else{
                return redirect()->back()->with('error','Gagal memperbarui data Konfigurasi!');
            }
        }
    }
}