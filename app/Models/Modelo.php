<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Modelo;

class Modelo extends Model
{
    public $variables = [
        'Modelo_ID',
        'Nombre_Modelo',
        'Marca_ID_Foreign'
    ];
    public $timestamps = false;
    protected $primaryKey = 'Modelo_ID';
    use HasFactory;
    public function marcas(): HasMany
    {
        return $this->hasMany(Marca::class);
    }
}
