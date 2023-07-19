<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuci extends Model
{
    protected $table = 'cucis';
    protected $primaryKey = 'cuci_id';  
    public $timestamps = true;
    protected $fillable =
    [  
     'barang_id',
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
