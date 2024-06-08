<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganKeadaan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'keterangan'];
    protected $table = 'keterangan_keadaan';
    public $timestamps = false;

    function dataKeadaan()
    {
        return $this->hasMany(DataKeadaan::class, 'keterangan_id');
    }
}
