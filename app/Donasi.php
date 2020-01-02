<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    public $timestamps = false;
    protected $table = 'donasis';
    protected $primaryKey = 'donasiId';
    protected $fillable = [
        'adminId',
        'donasiValue',
        'donasiCreate',
        'donasiUpdate'
    ];
}
