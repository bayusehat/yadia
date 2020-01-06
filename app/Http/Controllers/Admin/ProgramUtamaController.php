<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\ProgramUtama;

class ProgramUtamaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Program Utama',
            'content' => 'admin.program.program_utama',
            'parentActive' => 'fitur',
            'urlActive' => 'program-utama',
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function loadData()
    {
        $response['data'] = [];
        $programUtama = ProgramUtama::all();

        foreach ($programUtama as $i => $v) {
            $programUtamaIcon = '<img src="'.asset('program-utama/'.$v->programUtamaIcon).'" style="width:100px">';
            $response['data'][] = [
                ++$i,
                $programUtamaIcon,
                $v->programUtamaTitle,
                '
                <a href="'.url('admin/progutama/edit/'.$v->programUtamaId).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" onclick="deleteData('.$v->programUtamaId.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                '
            ];    
        }

        return response($response);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Program Utama / Misi Utama',
            'content' => 'admin.program.program_utama_create',
            'parentActive' => 'fitur',
            'urlActive' => 'program-utama',
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function insert(Request $request)
    {
        $rules = [
            'programUtamaTitle' => 'required',
            'programUtamaIcon' => 'required',
            'programUtamaContent' => 'required|min:30'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            
            $icon = $request->file('programUtamaIcon');
            $programUtamaIcon = Str::random(10).$icon->getClientOriginalName();
            $icon->move(public_path('/program-utama'), $programUtamaIcon);

            $data = [
                'programUtamaTitle' => $request->input('programUtamaTitle'),
                'programUtamaIcon' => $programUtamaIcon,
                'programUtamaContent' => $request->input('programUtamaContent'),
                'programUtamaCreate' => date('Y-m-d H:i:s'),
                'programUtamaUpdate' => date('Y-m-d H:i:s')
            ];

            $insert = ProgramUtama::insert($data);

            if($insert){
                return redirect()->back()->with('success','Berhasil menambahkan Program Utama baru!');
            }else{
                return redirect()->back()->with('error','Gagal menambahkan Program Utama baru!');
            }
        }
    }

    public function edit($id)
    {
        $programUtama = ProgramUtama::where('programUtamaId',$id)->first();
        $data = [
            'title' => 'Edit Program Utama',
            'content' => 'admin.program.program_utama_edit',
            'parentActive' => 'fitur',
            'urlActive' => 'program-utama',
            'progutama' => $programUtama
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $progutama = ProgramUtama::where('programUtamaId',$id)->first();
        $rules = [
            'programUtamaTitle' => 'required',
            'programUtamaContent' => 'required|min:30'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            if($request->has('programUtamaIcon')){
                if(file_exists(public_path().'/program-utama/'.$progutama->programUtamaIcon)){
                    unlink(public_path().'/program-utama/'.$progutama->programUtamaIcon);
                }

                $icon = $request->file('programUtamaIcon');
                $programUtamaIcon = Str::random(10).$icon->getClientOriginalName();
                $icon->move(public_path('/program-utama'), $programUtamaIcon);

                $data = [
                    'programUtamaTitle' => $request->input('programUtamaTitle'),
                    'programUtamaIcon' => $programUtamaIcon,
                    'programUtamaContent' => $request->input('programUtamaContent'),
                    'programUtamaUpdate' => date('Y-m-d H:i:s')
                ];
            }else{
                $data = [
                    'programUtamaTitle' => $request->input('programUtamaTitle'),
                    'programUtamaContent' => $request->input('programUtamaContent'),
                    'programUtamaUpdate' => date('Y-m-d H:i:s')
                ];
            }

            $update = ProgramUtama::where('programUtamaId',$id)->update($data);

            if($update){
                return redirect()->back()->with('success','Berhasil memperbarui Program Utama!');
            }else{
                return redirect()->back()->with('error','Gagal memperbarui Program Utama!');
            }
        }
    }

    public function destroy($id)
    {
        $progutama = ProgramUtama::where('programUtamaId',$id)->first();
        if(file_exists(public_path().'/program-utama/'.$progutama->programUtamaIcon)){
            unlink(public_path().'/program-utama/'.$progutama->programUtamaIcon);
        }

        $delete = ProgramUtama::where('programUtamaId',$id)->delete();

        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus data Program Utama'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal menghapus data Program Utama'
            ]);
        }
    }
} 