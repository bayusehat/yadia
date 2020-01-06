<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Gallery',
            'content' => 'admin.gallery.gallery',
            'parentActive' => 'fitur',
            'urlActive' => 'gallery',
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function loadData()
    {
        $response['data'] = [];
        $gallery = Gallery::all();

        foreach ($gallery as $i => $v) {
            $file = '<a href="'.asset('gallery/'.$v->galleryfile).'" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>';
            $response['data'][] = [
                ++$i,
                $v->galleryTitle,
                $file,
                date('d/m/y H:i', strtotime($v->galleryCreate)),
                '
                <a href="'.url('admin/gallery/edit/'.$v->galleryId).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" onclick="deleteData('.$v->galleryId.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                '
            ];
        }

        return response($response);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Gallery',
            'content' => 'admin.gallery.gallery_create',
            'parentActive' => 'fitur',
            'urlActive' => 'gallery',
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function insert(Request $request)
    {
        $rules = [
            'galleryTitle' => 'required',
            'galleryDescription' => 'required',
            'galleryFile' => 'required|max:5000'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            if($request->has('galleryFile')){
                $file = $request->file('galleryFile');
                $galleryFile = Str::random(10).$file->getClientOriginalName();
                $file->move(public_path('/gallery'),$galleryFile);
            }

            $data = [
                'galleryTitle' => $request->input('galleryTitle'),
                'galleryDescription' => $request->input('galleryDescription'),
                'galleryfile' => $galleryFile,
                'galleryCreate' => date('Y-m-d H:i:s'),
                'galleryUpdate' => date('Y-m-d H:i:s')
            ];

            $insert = Gallery::insert($data);

            if($insert){
                return redirect()->back()->with('success','Berhasil menambah Gallery baru!');
            }else{
                return redirect()->back()->with('error','Gagal menambah Gallery baru!');
            }
        }
    }

    public function edit($id)
    {
        $gallery = Gallery::where('galleryId',$id)->first();
        $data  = [
            'title' => 'Edit Gallery '.$gallery->galleryTitle,
            'content' => 'admin.gallery.gallery_edit',
            'parentActive' => 'fitur',
            'urlActive' => 'gallery',
            'gallery' =>  $gallery
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $rules = [
            'galleryTitle' => 'required',
            'galleryDescription' => 'required',
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            if($request->has('galleryFile')){
                if(file_exists(public_path() .'/gallery/'.$gallery->galleryfile)){
                    unlink(public_path() .'/gallery/'.$gallery->galleryfile);
                }
                $file = $request->file('galleryFile');
                $galleryFile = Str::random(10).$file->getClientOriginalName();
                $file->move(public_path('/gallery'),$galleryFile); 

                $data = [
                    'galleryTitle'       => $request->input('galleryTitle'),
                    'galleryDescription' => $request->input('galleryDescription'),
                    'galleryfile'        => $galleryFile,
                    'galleryUpdate' => date('Y-m-d H:i:s')
                ];
            }else{
                $data = [
                    'galleryTitle'       => $request->input('galleryTitle'),
                    'galleryDescription' => $request->input('galleryDescription'),
                    'galleryUpdate' => date('Y-m-d H:i:s')
                ];
            }

           

            $update = Gallery::where('galleryId',$id)->update($data);

            if($update){
                return redirect()->back()->with('success','Berhasil memperbarui Gallery!');
            }else{
                return redirect()->back()->with('error','Gagal memperbarui Gallery!');
            }
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if(file_exists(public_path() .'/gallery/'.$gallery->galleryfile)){
            unlink(public_path() .'/gallery/'.$gallery->galleryfile);
        }

        $delete = Gallery::where('galleryId',$id)->delete();

        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus data Gallery!'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal menghapus data Gallery!'
            ]);
        }
    }
}