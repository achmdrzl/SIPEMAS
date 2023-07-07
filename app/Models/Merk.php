<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merks';
    protected $primaryKey = 'merk_id'; 
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable =
    [
     'merk_id',
     'merk_kode',
     'merk_nama',
     'status'
    ];
}
