<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\NewsCategory;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kategori Berita',
            'content' => 'admin.news.news_category',
            'parentActive' => 'news',
            'urlActive' => 'news-category'
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function loadData()
    {
        $response['data'] = [];
        $newsCategory = NewsCategory::where('newsCategoryDelete',0)->get();

        foreach ($newsCategory as $i => $v){
            $response['data'][] = [
                ++$i,
                $v->newsCategoryName,
                '
                <a href="javascript:void(0)" onclick="show('.$v->newsCategoryId.')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" onclick="deleteData('.$v->newsCategoryId.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                '
            ];
        }
        return response($response);
    }

    public function insert(Request $request)
    {
        $rules = [
            'newsCategoryName' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' => $isValid->errors()
            ]);
        }else{
            $data = [
                'newsCategoryName' => $request->input('newsCategoryName'),
                'newsCategorySlug' => Str::slug($request->input('newsCategoryName'),'-'),
                'newsCategoryCreate' => date('Y-m-d H:i:s'),
                'newsCategoryUpdate' => date('Y-m-d H:i:s')
            ];

            $insert = NewsCategory::insert($data);

            if($insert){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil menambahkan Kategori Berita baru!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal menambahkan Kategori Berita baru!'
                ]);
            }
        }
    }

    public function edit($id)
    {
        $newsCategory = NewsCategory::where('newsCategoryId',$id)->first();
        return response($newsCategory);
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'newsCategoryName' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response([
                'status' => 401,
                'errors' => $isValid->errors()
            ]);
        }else{
            $data = [
                'newsCategoryName' => $request->input('newsCategoryName'),
                'newsCategorySlug' => Str::slug($request->input('newsCategoryName'),'-'),
                'newsCategoryUpdate' => date('Y-m-d H:i:s')
            ];

            $update = NewsCategory::where('newsCategoryId',$id)->update($data);

            if($update){
                return response([
                    'status' => 200,
                    'result' => 'Berhasil memperbarui Kategori Berita!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'result' => 'Gagal memperbarui Kategori Berita!'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $delete = NewsCategory::where('newsCategoryId',$id)->update([
            'newsCategoryDelete' => 1
        ]);

        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus data Kategori Berita!'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal menghapus data Kategori Berita!'
            ]);
        }
    }
}