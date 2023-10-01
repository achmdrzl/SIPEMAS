<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualanReturnDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_penjualan_return_id';

    protected $fillable = [
        'barang_id',
        'penjualan_return_nobukti',
        'detail_penjualan_barang_berat',
        'detail_penjualan_return_berat',
        'detail_penjualan_return_harga_jual',
        'detail_penjualan_return_harga_return',
        'detail_penjualan_return_potongan',
        'detail_penjualan_return_ppn',
        'detail_penjualan_return_jml_harga',
        'detail_penjualan_return_kondisi',
    ];

    public function return()
    {
        return $this->belongsTo(TransaksiPenjualanReturn::class, 'penjualan_return_nobukti', 'penjualan_return_nobukti');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
