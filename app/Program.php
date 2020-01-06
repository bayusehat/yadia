<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public $timestamps = false;
    protected $table = 'programs';
    protected $primaryKey = 'programId';
    protected $fillable = [
        'programTitle',
        'programImage',
        'programContent',
        'programCreate',
        'programUpdate'
    ];
}
