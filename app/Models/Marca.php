<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $variables = [
        'Marca_ID',
        'Nombre_Marca'
    ];
    protected $primaryKey = 'Marca_ID';
    public $timestamps = false;
    use HasFactory;
}
