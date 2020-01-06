<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    public $timestamps = false;
    protected $table = 'news_tags';
    protected $primaryKey = 'newsTagId';
    protected $fillable = [
        'newsId',
        'newsTag'
    ];
}
