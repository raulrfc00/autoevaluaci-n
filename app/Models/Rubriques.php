<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubriques extends Model
{
    use HasFactory;
    
    protected $table = 'rubriques'; // Nombre de la tabla

    protected $primaryKey = 'id'; // La clave principal, 'id' es el valor predeterminado y no necesita ser definido explícitamente

    public $timestamps = false; // Deshabilitar timestamps

    // protected $keyType = 'INT'; pordefecto se considera INT 

    public function criteri_avaluacio()
    {
        return $this->belongsTo(CriterisAvaluacio::class);
    }
}
