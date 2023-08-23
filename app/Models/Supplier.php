<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'supplier_id';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable =
    [
        'supplier_id',
        'supplier_kode',
        'supplier_nama',
        'supplier_alamat',
        'supplier_no_telp',
        'supplier_kota',
        'status'
    ];

    public function pembelian()
    {
        return $this->hasMany(TransaksiPembelian::class, 'supplier_id');
    }

    public function pengeluaran()
    {
        return $this->hasOne(TransaksiPengeluaran::class, 'supplier_id');
    }
}
