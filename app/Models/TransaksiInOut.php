<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiInOut extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaksi_id';

    protected $fillable = [
        'transaksi_id', 'kode_transaksi', 'tgl_transaksi', 'jenis_transaksi', 'total', 'keterangan'
    ];

}
