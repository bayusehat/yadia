<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    public $timestamps = false;
    protected $table = 'news_categories';
    protected $primaryKey = 'newsCategoryId';
    protected $fillable = [
        'newsCategoryName',
        'newsCategorySlug',
        'newsCategoryCreate',
        'newsCategoryUpdate'
    ];
}
