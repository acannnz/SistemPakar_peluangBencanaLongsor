<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keadaan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'kode_keadaan', 'nilai_keadaan'];
    protected $table = 'keadaan';
    public $timestamps = false;

    function dataKeadaan()
    {
        return $this->hasMany(DataKeadaan::class);
    }
}
