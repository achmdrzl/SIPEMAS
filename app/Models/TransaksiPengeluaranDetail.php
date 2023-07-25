<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPengeluaranDetail extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'detail_pengeluaran_id';

    protected $fillable   = [
        'detail_pengeluaran_id', 'pengeluaran_nobukti', 'kadar_id', 'barang_id', 'detail_pengeluaran_berat', 'detail_pengeluaran_kembali', 'detail_pengeluaran_kondisi'
    ];
}
