<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualanDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_penjualan_id';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'detail_penjualan_berat_jual',
        'detail_penjualan_harga',
        'detail_penjualan_ongkos',
        'detail_penjualan_diskon',
        'detail_penjualan_jml_harga',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
