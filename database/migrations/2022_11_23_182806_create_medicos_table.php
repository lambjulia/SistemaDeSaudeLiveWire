<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('data_nascimento');
            $table->string('genero');
            $table->unsignedBigInteger('especialidade_id')->unsigned();
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
            $table->unsignedBigInteger('convenio_id')->unsigned();
            $table->foreign('convenio_id')->references('id')->on('convenios');
            $table->string('email');
            $table->string('telefone');
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
        Schema::dropIfExists('medicos');
    }
}
