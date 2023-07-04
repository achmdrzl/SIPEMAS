<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBarang extends Model
{
    protected $table = 'models';
    protected $primaryKey = 'model_id'; 
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable =
    [
     'model_id',
     'model_nama',
     'status'
    ];
}
