<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Clave principal. Número secuencial que se utiliza para garantizar la unicidad de los datos.');

            $table->string('solicitante')->comment('Nombre del solicitante de la orden de trabajo.');

            $table->date('fechaInicio')->comment('Fecha de inicio de las órdenes de trabajo.');
            $table->date('fechaFin')->nullable()->comment('Fecha de finalización de las ordenes de trabajo.');
            $table->enum('tipoMantenimiento', ['Correctivo', 'Preventivo', 'Predictivo', 'Emergente'])->comment('Tipo de mantenimiento a realizar.');
            $table->string('area')->nullable()->comment('Nombre del área la cual solicita la orden de trabajo.');
            $table->enum('tipoTrabajo', ['Obras Civiles', 'Obras Eléctricas'])->comment('Tipo de trabajo a realizar de la orden de trabajo.');
            $table->longText('descripcion')->comment('Descripción de la solictud de la orden de trabajo.');
            $table->enum('tipoEstado', ['Pendiente', 'Finalizado'])->default('Pendiente')->comment('Tipo de estado del mantenimiento.');
            $table->double('monto', 8, 2)->nullable()->comment('Precio del trabajo a realizar (COP).');
            $table->longText('observacion')->comment('Observciones de la solictud de la orden de trabajo.');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}
