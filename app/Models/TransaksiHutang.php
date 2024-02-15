<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHutang extends Model
{
    use HasFactory;

    protected $primaryKey = 'hutang_id';

    protected $fillable = [
        'hutang_id', 'kode_hutang', 'tgl_transaksi', 'total', 'total_bayar',  'keterangan', 'status'
    ];
}
