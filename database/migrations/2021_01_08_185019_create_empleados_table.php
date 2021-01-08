<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->String('codigo');
            $table->String('nombre');
            $table->String('apellidopaterno')->default('');
            $table->String('apellidomaterno');
            $table->String('email');
            $table->String('contrato');
            $table->String('telefono',10)->default('');
            $table->String('direccion',250)->default('');
            $table->double('salario')->default(4000);
            $table->boolean('status')->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('empleados');
    }
}
