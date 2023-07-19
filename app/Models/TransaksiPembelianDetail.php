<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelianDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_pembelian_id';

    protected $fillable = [
        'pembelian_id',
        'barang_id',
        'detail_pembelian_kadar',
        'detail_pembelian_berat',
        'detail_pembelian_harga_beli',
        'detail_pembelian_nilai_tukar',
        'detail_pembelian_jml_beli',
        'detail_pembelian_total',
    ];

    public function pembelian()
    {
        return $this->belongsTo(TransaksiPembelian::class, 'pembelian_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
