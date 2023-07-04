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
     'barang_kode',
     'barang_nama',
     'barang_foto',
     'barang_barcode',
     'barang_status',
     'barang_lokasi',
     'model_id',
     'pabrik_id',
     'merk_id',
     'supplier_id',
     'kadar_id'
    ];

    
}
