<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'barang_id';
    public $timestamps = true;

    protected $fillable =
    [
        'barang_id',
        'barang_nama',
        'barang_kode',
        'barang_foto',
        'barang_berat',
        'barang_lokasi',
        'barang_kondisi',
        'barang_status',
        'model_id',
        'pabrik_id',
        'supplier_id',
        'kadar_id'
    ];

    public function kadar()
    {
        return $this->belongsTo(Kadar::class, 'kadar_id');
    }

    public function model()
    {
        return $this->belongsTo(ModelBarang::class, 'model_id');
    }

    public function pabrik()
    {
        return $this->belongsTo(Pabrik::class, 'pabrik_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function transaksipembeliandetail()
    {
        return $this->hasMany(TransaksiPembelianDetail::class, 'barang_id');
    }

    public function transaksipenjualandetail()
    {
        return $this->hasMany(TransaksiPenjualanDetail::class, 'barang_id');
    }

    public function transaksipenjualanreturndetail()
    {
        return $this->hasMany(TransaksiPenjualanReturnDetail::class, 'barang_id');
    }

    public function transaksipengeluarandetail()
    {
        return $this->hasMany(TransaksiPengeluaranDetail::class, 'barang_id');
    }
}
