<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    // Nombre de la tabla en la base de datos MySQL.
    protected $table = "asignaciones";

    // Lista de atributos que pueden ser asignados masivamente.
    protected $fillable = [
        'orden_id', 'user_id'
    ];

    // Relaciones

    public function orden()
    {
        return $this->belongsTo('App\Ordenes');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}
