<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Role',
            'content' => 'admin.pengaturan.role',
            'parentActive' => 'pengaturan',
        ];

        return view('admin.layout.index',['data' =>$data]);
    }

    public function loadData()
    {
        $response['data'] = [];
        $role = Role::all();

        foreach($role as $i => $v){
            $response['data'][] = [
                ++$i,
                $v->roleName,
                '
                <a href="javascript:void(0)" onclick="show('.$v->roleId.')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData('.$v->roleId.')"><i class="fas fa-trash"></i> Hapus</button>
                '
            ];
        }

        return response($response);
    }

    public function insert(Request $request)
    {
        $rules = [
            'roleName' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' =>  $isValid->errors()
            ]);
        }else{
            $insert = Role::insert([
                'roleName' => $request->input('roleName'),
                'roleCreate' => date('Y-m-d H:i:s'),
                'roleUpdate' => date('Y-m-d H:i:s')
            ]);

            if($insert){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil menambahkan Role baru!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal menambahkan Role baru!'
                ]);
            }
        }   
    }
    public function edit($id)
    {
        $role = Role::where('roleId', $id)->first();
        return response($role);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'roleName' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' =>  $isValid->errors()
            ]);
        }else{
            $update = Role::where('roleId',$id)->update([
                'roleName' => $request->input('roleName'),
                'roleUpdate' => date('Y-m-d H:i:s')
            ]);

            if($update){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil memperbarui Role baru!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal memperbarui Role baru!'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $delete = Role::where('roleId', $id)->delete();
        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus Role'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal menghapus Role'
            ]);
        }
    }
}