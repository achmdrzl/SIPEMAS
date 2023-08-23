<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPengeluaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'pengeluaran_id';

    protected $fillable   = [
        'pengeluaran_id', 'pengeluaran_nobukti', 'pengeluaran_tanggal', 'pengeluaran_keterangan', 'supplier_id', 'user_id', 'jenis',
    ];

    public function pengeluarandetail()
    {
        return $this->hasMany(TransaksiPengeluaranDetail::class, 'pengeluaran_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
