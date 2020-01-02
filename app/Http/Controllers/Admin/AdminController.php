<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Admin',
            'content' => 'admin.pengaturan.admin',
            'parentActive' => 'pengaturan',
            'urlActive' => 'admin',
            'role' => Role::all()
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function loadData()
    {
        $response['data'] = [];
        $admin = Admin::join('roles','roles.roleId','=','admins.adminId')
                        ->get();

        foreach ($admin as $i => $v) {
            $response['data'][] = [
                ++$i,
                $v->roleName,
                $v->adminName,
                $v->adminUsername,
                $v->adminLastLogin,
                '
                <a href="javascript:void(0)" onclick="show('.$v->adminId.')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" onclick="deleteData('.$v->adminId.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                '
            ];
        }

        return response($response);
    }

    public function insert(Request $request)
    {
        $rules = [
            'adminName'     => 'required',
            'adminUsername' => 'required|unique:admins',
            'adminPassword' => 'required',
            'roleId'        => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' => $isValid->errors()
            ]);
        }else{
            $data = [
                'adminName' => $request->input('adminName'),
                'adminUsername' => $request->input('adminUsername'),
                'adminPassword' => Hash::make($request->input('adminPassword')),
                'roleId' => $request->input('roleId'),
                'adminLastLogin' => date('Y-m-d H:i:s'),
            ];

            $insert = Admin::insert($data);

            if($insert){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil menambahkan Admin baru!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal menambahkan Admin baru!'
                ]);
            }
        }
    }

    public function edit($id)
    {
        $admin = Admin::join('roles','roles.roleId','=','admins.roleId')
                      ->where('adminId', $id)
                      ->first();
        return response($admin);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::where('adminId',$id)->first();
        $rules = [
            'adminName'     => 'required',
            'adminUsername' => 'required|unique:admins,adminUsername,'.$admin->adminId.',adminId',
            'roleId'        => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' => $isValid->errors()
            ]);
        }else{
            $data = [
                'adminName'     => $request->input('adminName'),
                'adminUsername' => $request->input('adminUsername'),
                'roleId'        => $request->input('roleId'),
            ];

            $update = Admin::where('adminId',$id)->update($data);

            if($update){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil memperbarui Admin baru!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal memperbarui Admin baru!'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $delete = Admin::where('adminId',$id)->delete();
        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus data Admin'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal menghapus data Admin'
            ]);
        }
    }
}