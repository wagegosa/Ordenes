<?php

namespace App\Imports;

use App\Ordenes;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdenesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Ordenes([
            'solicitante' => $row[0],
            'fechaInicio' => $row[1],
            'fechaFin' => $row[2],
            'tipoMantenimiento' => $row[3],
            'area' => $row[4],
            'tipoTrabajo' => $row[5],
            'descripcion' => $row[6],
            'tipoEstado' => $row[7],
            'created_at' => $row[8],
            'updated_at' => $row[9],
        ]);
    }
}
