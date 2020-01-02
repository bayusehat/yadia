<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Menu',
            'content' => 'admin.pengaturan.menu',
            'parentActive' => 'pengaturan',
            'urlActive' => 'menu',
            'parent' => Menu::where('menuParent',0)->get()
        ];

        return view('admin.layout.index', ['data' => $data]);
    }

    public function loadData()
    {
        $response['data'] = [];
        $menu = Menu::all();
        foreach ($menu as $i => $v) {
             $parent = Menu::where('menuId', $v->menuParent)->first();
            if($parent){
                $menuParent = $parent->menuName;
            }else{ 
                $menuParent = '<b><i>is Parent!</i></b>';
            }
            $response['data'][] = [
                ++$i,
                $v->menuName,
                $v->menuUrl,
                $menuParent,
                '
                <a href="javacript:void(0)" onclick="show('.$v->menuId.')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" onclick="deleteData('.$v->menuId.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                '
            ];
        }

        return response($response);
    }

    public function insert(Request $request)
    {
        $rules = [
            'menuName' => 'required',
            'menuUrl' => 'required',
            'menuParent' => 'required',
            'menuUrlActive' => 'required',
            'menuParentActive' => 'required',
            'menuIcon' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' => $isValid->errors()
            ]);
        }else{
            $data = [
                'menuName' => $request->input('menuName'),
                'menuUrl' => $request->input('menuUrl'),
                'menuParent' => $request->input('menuParent'),
                'menuUrlActive' => $request->input('menuUrlActive'),
                'menuParentActive' => $request->input('menuParentActive'),
                'menuIcon' => $request->input('menuIcon'),
                'menuCreate' => date('Y-m-d H:i:s'),
                'menuUpdate' => date('Y-m-d H:i:s')
            ];

            $insert = Menu::insert($data);

            if($insert){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil menambahkan Menu baru!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal menambahkan Menu baru!'
                ]);
            }
        }
    }

    public function edit($id)
    {
        $menu = Menu::where('menuId', $id)->first();
        return response($menu);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'menuName' => 'required',
            'menuUrl' => 'required',
            'menuParent' => 'required',
            'menuUrlActive' => 'required',
            'menuParentActive' => 'required',
            'menuIcon' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' => $isValid->errors()
            ]);
        }else{
            $data = [
                'menuName' => $request->input('menuName'),
                'menuUrl' => $request->input('menuUrl'),
                'menuParent' => $request->input('menuParent'),
                'menuUrlActive' => $request->input('menuUrlActive'),
                'menuParentActive' => $request->input('menuParentActive'),
                'menuIcon' => $request->input('menuIcon'),
                'menuUpdate' => date('Y-m-d H:i:s')
            ];

            $update = Menu::where('menuId', $id)->update($data);

            if($update){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil memperbarui Menu!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal memperbarui Menu!'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $delete = Menu::where('menuId',$id)->delete();

        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus Menu!'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal mengahapus Menu!'
            ]);
        }
    }
}