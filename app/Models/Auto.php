<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Auto extends Model
{
    public $fillable = [
        'Kilometraje',
        'Patente',
        'Marca_ID_Auto',
        'Modelo_ID_Auto' 
    ];

    
    public $timestamps = false;
    use HasFactory;

    public function marca(): HasOne
    {
        return $this->hasOne(Marca::class, 'Marca_ID');
    }

    public function modelo(): HasOne
    {
        return $this->hasOne(Modelo::class, 'Modelo_ID');
    }
}
