<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;
    
    protected $table = 'usuaris'; // Nombre de la tabla

    protected $primaryKey = 'id'; // La clave principal, 'id' es el valor predeterminado y no necesita ser definido explícitamente

    public $timestamps = false; // Deshabilitar timestamps

    // protected $keyType = 'INT'; pordefecto se considera INT 

    public function tipus_usuari()
    {
        return $this->belongsTo(TipusUsuari::class);
    }

    public function moduls()
    {
        return $this->belongsToMany(Modul::class, 'usuaris_has_moduls');
    }

    public function criteris_avaluacio()
    {
        return $this->belongsToMany(CriterisAvaluacio::class, 'alumnes_has_criteris_avaluacio');
    }
}
