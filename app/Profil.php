<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public $timestamps = false;
    protected $table = 'profils';
    protected $primaryKey = 'profilId';
    protected $fillable = [
        'profilName',
        'profileContent',
        'profilCreate',
        'profilUpdate'
    ];
}
