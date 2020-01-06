<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramUtama extends Model
{
    public $timestamps = false;
    protected $table = 'program_utamas';
    protected $primaryKey = 'programUtamaId';
    protected $fillable = [
        'programUtamaTitle',
        'programUtamaIcon',
        'programUtamaContent',
        'programUtamaCreate',
        'programUtamaUpdate'
    ];
}
