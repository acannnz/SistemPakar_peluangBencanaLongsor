<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeadaan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'kode_keadaan_id', 'keadaan', 'keterangan_id'];
    protected $table = 'data_keadaan';
    public $timestamps = false;

    function keadaan()
    {
        return $this->belongsTo(Keadaan::class, 'kode_keadaan_id');
    }
    function keteranganKeadaan()
    {
        return $this->belongsTo(KeteranganKeadaan::class, 'keterangan_id');
    }
}
