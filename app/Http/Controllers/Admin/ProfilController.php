<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $data = [
            'title'        => 'Data Profil',
            'content'      => 'admin.profil.profil',
            'parentActive' => 'fitur',
            'urlActive'    => 'profil',
        ];

        return view('admin.layout.index',['data' => $data]);
    } 

    public function loadData()
    {
        $response['data'] = [];
        $profil = Profil::all();

        foreach ($profil as $i => $v) {
            $response['data'][] = [
                ++$i,                
                $v->profilName,
                date('d/m/Y h:i', strtotime($v->profilUpdate)),
                '
                <a href="'.url('admin/profil/edit/'.$v->profilId).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" onclick="deleteData('.$v->profilId.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                '
            ];
        }

        return response($response);
    }

    public function create()
    {
        $data = [
            'title'        => 'Tambah Profil',
            'content'      => 'admin.profil.profil_create',
            'parentActive' => 'fitur',
            'urlActive'    => 'profil'
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function insert(Request $request)
    {
        $rules = [
            'profilName' => 'required',
            'profilContent' => 'required',
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $data = [
                'profilName' => $request->input('profilName'),
                'profilSlug' => Str::slug($request->input('profilName'),'-'),
                'profilContent' => $request->input('profilContent'),
                'profilCreate' => date('Y-m-d H:i:s'),
                'profilUpdate' => date('Y-m-d H:i:s')
            ];

            $insert = Profil::insert($data);

            if($insert){
                return redirect()->back()->with('success','Berhasil menambah Profil baru!');
            }else{
                return redirect()->back()->with('error','Gagal menambah Profil baru!');
            }
        }
    }

    public function edit($id)
    {
        $profil = Profil::where('profilId', $id)->first();
        $data = [
            'title' => 'Edit Profil '.$profil->profilName,
            'content' => 'admin.profil.profil_edit',
            'parentActive' => 'fitur',
            'urlActive' => 'profil',
            'profil' => $profil
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'profilName' => 'required',
            'profilContent' => 'required',
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $data = [
                'profilName' => $request->input('profilName'),
                'profilSlug' => Str::slug($request->input('profilName'),'-'),
                'profilContent' => $request->input('profilContent'),
                'profilUpdate' => date('Y-m-d H:i:s')
            ];

            $update = Profil::where('profilId', $id)->update($data);

            if($update){
                return redirect()->back()->with('success','Berhasil memperbarui Profil!');
            }else{
                return redirect()->back()->with('error','Gagal memperbarui Profil!');
            }
        }
    }

    public function destroy($id)
    {
        $delete = Profil::where('profilId',$id)->delete();

        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus data Profil!'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal menghapus data Profil!'
            ]);
        }
    }
}