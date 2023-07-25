<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPengeluaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'pengeluaran_id';
    
    protected $fillable   = [
        'pengeluaran_id', 'pengeluaran_nobukti', 'pengeluaran_tanggal', 'pengeluaran_keterangan', 'supplier_id', 'user_id'    
    ];
}
