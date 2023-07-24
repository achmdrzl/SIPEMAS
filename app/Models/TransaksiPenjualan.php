<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $primaryKey = 'penjualan_id';

    protected $fillable = [
        'penjualan_id',
        'penjualan_kode',
        'penjualan_tanggal',
        'penjualan_nobukti',
        'penjualan_subtotal',
        'penjualan_diskon',
        'penjualan_ppn',
        'penjualan_grandtotal',
        'penjualan_bayar',
        'penjualan_kembalian',
        'penjualan_keterangan',
        'user_id',
    ];

    public function penjualandetail()
    {
        return $this->hasMany(TransaksiPenjualanDetail::class, 'penjualan_id');
    }

    public function penjualanreturn()
    {
        return $this->hasMany(TransaksiPenjualanReturn::class, 'penjualan_kode');
    }
}
