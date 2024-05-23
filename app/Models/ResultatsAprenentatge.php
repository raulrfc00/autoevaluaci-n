<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatsAprenentatge extends Model
{
    use HasFactory;
    
    protected $table = 'resultats_aprenentatge'; // Nombre de la tabla

    protected $primaryKey = 'id'; // La clave principal, 'id' es el valor predeterminado y no necesita ser definido explícitamente

    public $timestamps = false; // Deshabilitar timestamps

    // protected $keyType = 'INT'; pordefecto se considera INT 

    public function modul()
    {
        return $this->belongsTo(Moduls::class);
    }

    public function criteris_avaluacio()
    {
        return $this->hasMany(CriterisAvaluacio::class);
    }
}
