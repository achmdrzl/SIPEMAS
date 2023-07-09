<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    protected $table = 'detail_barangs';
    protected $primaryKey = 'detail_barang_id'; 
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable =
    [ 
     'barang_id',
     'detail_barang_no_transaksi',
     'detail_barang_harga_jual', 
     'detail_barang_harga_beli', 
     'detail_barang_berat', 
     'detail_barang_keterangan', 
     'detail_barang_kondisi'
    ];
}
