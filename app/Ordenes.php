<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    // Nombre de la tabla en la base de datos MySQL.
	protected $table = "ordenes";

    // Lista de atributos que pueden ser asignados masivamente.
	protected $fillable = [
		'solicitante'
		,'fechaInicio'
		,'fechaFin'
		,'tipoMantenimiento'
		,'area'
		,'tipoTrabajo'
		,'descripcion'
		,'tipoEstado'
		,'monto'
		,'observacion'
	];

	// Relaciones
	 
	public function asignaciones()
	{
		return $this->hasMany('App\asignaciones');
	}
}
