<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    use HasFactory;

    protected $primaryKey = 'pembelian_id';

    protected $fillable = [
        'pembelian_id',
        'pembelian_tanggal',
        'pembelian_nobukti',
        'pembelian_subtotal',
        'pembelian_diskon',
        'pembelian_ppn',
        'pembelian_grandtotal',
        'pembelian_keterangan',
        'supplier_id',
        'user_id',
    ];

    public function pembeliandetail()
    {
        return $this->hasMany(TransaksiPembelianDetail::class, 'pembelian_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
