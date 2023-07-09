<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'barang_id'; 
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable =
    [ 
     'barang_nama',
     'barang_kode',
     'barang_foto', 
     'barang_berat', 
     'barang_lokasi', 
     'barang_kondisi', 
     'barang_status', 
     'model_id',
     'pabrik_id', 
     'supplier_id',
     'kadar_id'
    ];

    
}
