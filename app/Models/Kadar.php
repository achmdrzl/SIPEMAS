<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kadar extends Model
{
    protected $table = 'kadars';

    protected $primaryKey = 'kadar_id';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable =
    [
        'kadar_id',
        'kadar_kode',
        'kadar_nama',
        'kadar_harga_jual_1',
        'kadar_harga_jual_2',
        'status'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kadar_id');
    }
}
