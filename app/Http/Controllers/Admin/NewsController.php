<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Str;
use App\Admin;
use App\Role;
use App\News;
use App\NewsCategory;
use App\NewsTag;

class NewsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Berita',
            'content' => 'admin.news.news',
            'parentActive' => 'news',
            'urlActive' => 'news',
        ];

        return view('admin.layout.index',['data' => $data]);
    }
    
    public function loadData()
    {
        $response['data'] = [];
        $news = News::join('news_categories','news_categories.newsCategoryId','=','news.newsCategoryId')
                    ->join('admins','admins.adminId','=','news.adminId')
                    ->get();

        foreach ($news as $i => $v) {
            $newsThumbnail = '<img src="'.asset('news/'.$v->newsThumbnail).'" style="width:100px" alt="'.$v->newsTitle.'">';
            $response['data'][] = [
                ++$i,
                $newsThumbnail,
                $v->newsCategoryName,
                $v->newsTitle,
                $v->adminName,
                '
                <a href="'.url('admin/news/edit/'.$v->newsId).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" onclick="deleteData('.$v->newsId.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                '
            ];
        }
        return response($response);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Berita',
            'content' => 'admin.news.news_create',
            'parentActive' => 'news',
            'urlActive' => 'news',
            'newsCategory' => NewsCategory::where('newsCategoryDelete',0)->get()
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function insert(Request $request)
    {
        $rules = [
            'newsCategoryId' => 'required',
            'newsTitle' => 'required',
            'newsThumbnail' => 'required',
            'newsContent' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $thumb = $request->file('newsThumbnail');
            $newsThumbnail = Str::random(10).$thumb->getClientOriginalName();
            $thumb->move(public_path('/news'),$newsThumbnail);

            $data = [
                'newsCategoryId' => $request->input('newsCategoryId'),
                'newsTitle' => $request->input('newsTitle'),
                'newsThumbnail' => $newsThumbnail,
                'newsSlug' => Str::slug($request->input('newsTitle'),'-'),
                'newsContent' => $request->input('newsContent'),
                'adminId' => session('adminId'),
                'newsCreate' => date('Y-m-d H:i:s'),
                'newsUpdate' => date('Y-m-d H:i:s')
            ];

            $insert = News::insertGetId($data);

            if($insert){
                foreach ($request->input('newsTag') as $n => $nt) {
                    NewsTag::insert([
                        'newsId' => $insert,
                        'newsTag' => $nt
                    ]);
                }
                return redirect()->back()->with('success','Berhasil menambahkan Berita baru!');
            }else{
                return redirect()->back()->with('error','Gagal menambah Berita baru!');
            }
        }
    }

    public function edit($id)
    {
        $news = News::join('news_categories','news_categories.newsCategoryId','=','news.newsCategoryId')
                    ->join('admins','admins.adminId','=','news.adminId')
                    ->where('newsId',$id)
                    ->first();    
        $data = [
            'title' => 'Edit Berita',
            'content' => 'admin.news.news_edit',
            'parentActive' => 'news',
            'urlActive' => 'news',
            'news' => $news,
            'newsCategory' => NewsCategory::where('newsCategoryDelete',0)->get(),
            'newsTag' => NewsTag::where('newsId',$id)->get()
        ];

        return view('admin.layout.index',['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $news = News::join('news_categories','news_categories.newsCategoryId','=','news.newsCategoryId')
                    ->join('admins','admins.adminId','=','news.adminId')
                    ->where('newsId',$id)
                    ->first();

        $rules = [
            'newsCategoryId' => 'required',
            'newsTitle' => 'required',
            'newsContent' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            if($request->has('newsThumbnail')){
                if(file_exists(public_path() .'/news/'.$news->newsThumbnail)){
                    unlink(public_path() .'/news/'.$news->newsThumbnail);
                }

                $thumb = $request->file('newsThumbnail');
                $newsThumbnail = Str::random(10).$thumb->getClientOriginalName();
                $thumb->move(public_path('/news'),$newsThumbnail);

                $data = [
                    'newsCategoryId' => $request->input('newsCategoryId'),
                    'newsTitle' => $request->input('newsTitle'),
                    'newsThumbnail' => $newsThumbnail,
                    'newsSlug' => Str::slug($request->input('newsTitle'),'-'),
                    'newsContent' => $request->input('newsContent'),
                    'adminId' => session('adminId'),
                    'newsUpdate' => date('Y-m-d H:i:s')
                ];
            }else{
                $data = [
                    'newsCategoryId' => $request->input('newsCategoryId'),
                    'newsTitle' => $request->input('newsTitle'),
                    'newsSlug' => Str::slug($request->input('newsTitle'),'-'),
                    'newsContent' => $request->input('newsContent'),
                    'adminId' => session('adminId'),
                    'newsUpdate' => date('Y-m-d H:i:s')
                ];
            }

            $update = News::where('newsId',$id)->update($data);

            if($update){
                $check = NewsTag::where('newsId',$news->newsId);
                if($check->count()){
                    $check->delete();
                };
                
                foreach ($request->input('newsTag') as $n => $nt) {
                    NewsTag::insert([
                        'newsId' => $news->newsId,
                        'newsTag' => $nt
                    ]);
                }
                return redirect()->back()->with('success','Berhasil memperbarui Berita!');
            }else{
                return redirect()->back()->with('error','Gagal memperbarui Berita!');
            }
        }
    }

    public function destroy($id)
    {
        $news = News::join('news_categories','news_categories.newsCategoryId','=','news.newsCategoryId')
                    ->join('admins','admins.adminId','=','news.adminId')
                    ->where('newsId',$id)
                    ->first();

        if(file_exists(public_path() .'/news/'.$news->newsThumbnail)){
            unlink(public_path() .'/news/'.$news->newsThumbnail);
        }

        $delete = News::where('newsId',$id)->delete();

        if($delete){
            return response([
                'status' => 200,
                'result' => 'Berhasil menghapus data Berita!'
            ]);
        }else{
            return response([
                'status' => 500,
                'result' => 'Gagal menghapus data Berita!'
            ]);
        }
    }
}