<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concentrado extends Model
{
    use HasFactory;

    // protected $primaryKey = '';

    protected $table = 'concentrado';
    
    // public $timestamps = false;

    protected $fillable = [
        'Sm_Av',
        'Latitud',
        'Longitud',
        'Id_medida',
        'Circuito',
        'Luminarias',
        'Id_lampara',
        'Potencia',
        'Etiqueta',
        'Tipo_poste',
        'Dependencia',
        'Altura',
        'RPU',
        'Municipalizado'
    ];
}
