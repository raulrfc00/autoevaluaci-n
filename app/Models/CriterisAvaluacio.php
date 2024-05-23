<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriterisAvaluacio extends Model
{
    use HasFactory;
    
    protected $table = 'criteris_avaluacio'; // Nombre de la tabla

    protected $primaryKey = 'id'; // La clave principal, 'id' es el valor predeterminado y no necesita ser definido explícitamente

    public $timestamps = false; // Deshabilitar timestamps

    // protected $keyType = 'INT'; pordefecto se considera INT 

    public function resultat_aprenentatge()
    {
        return $this->belongsTo(ResultatsAprenentatge::class);
    }

    public function alumnes()
    {
        return $this->belongsToMany(Usuaris::class, 'alumnes_has_criteris_avaluacio');
    }

    public function rubriques()
    {
        return $this->hasMany(Rubriques::class);
    }
}
