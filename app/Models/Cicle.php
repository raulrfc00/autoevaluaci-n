<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicle extends Model
{
    use HasFactory;

    protected $table = 'cicles'; // Nombre de la tabla

    protected $primaryKey = 'id'; // La clave principal, 'id' es el valor predeterminado y no necesita ser definido explícitamente

    public $timestamps = false; // Deshabilitar timestamps

    // protected $keyType = 'INT'; pordefecto se considera INT 

    public function moduls()
    {
        return $this->hasMany(Moduls::class);
    }
}
