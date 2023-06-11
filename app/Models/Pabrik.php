<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabrik extends Model
{
    protected $table = 'pabriks';
    protected $primaryKey = 'pabrik_id'; 
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable =
    [
     'pabrik_nama'
    ];
}
