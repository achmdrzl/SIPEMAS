<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualanReturn extends Model
{
    use HasFactory;

    protected $primaryKey = 'penjualan_return_id';

    protected $fillable = [
        'penjualan_return_id',
        'penjualan_return_tanggal',
        'penjualan_return_nobukti',
        'penjualan_kode',
        'penjualan_return_keterangan',
        'user_id',
    ];

    public function penjualan()
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'penjualan_kode');
    }

    public function returndetail()
    {
        return $this->hasOne(TransaksiPenjualanReturnDetail::class, 'penjualan_return_nobukti', 'penjualan_return_nobukti');
    }

}
