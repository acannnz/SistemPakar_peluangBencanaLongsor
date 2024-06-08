<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_wilayah'];
    protected $table = 'wilayah';
    public $timestamps = false;
}
