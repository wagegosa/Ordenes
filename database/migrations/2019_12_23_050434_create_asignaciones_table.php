<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Clave principal. Número secuencial que se utiliza para garantizar la unicidad de los datos.');

            $table->unsignedBigInteger('orden_id')->comment('La orden es miembro de esta asignación. Clave externa para ordenes.id.');
            $table->foreign('orden_id')->references('id')->on('ordenes');

            $table->unsignedBigInteger('user_id')->comment('El usuario es miembro de esta asignación. Clave externa para users.id.');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('asignaciones');
    }
}
