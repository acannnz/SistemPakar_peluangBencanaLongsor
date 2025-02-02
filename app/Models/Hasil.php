<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'keadaan',
        'kode_keadaan'
    ];
    protected $table = 'data_longsor';
    public $timestamps = false;
}
