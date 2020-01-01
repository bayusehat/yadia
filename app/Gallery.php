<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;
    protected $table = 'galleries';
    protected $primaryKey = 'galleryId';
    protected $fillable = [
        'galleryTitle',
        'galleryDescription',
        'galleryfile',
        'galleryCreate',
        'galleryUpdate'
    ];
}
