<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo', ['texto', 'seleccion', 'textarea']);
            $table->string('nombrePregunta');
            $table->unsignedInteger('idItem');
            $table->foreign('idItem')->references('id')->on('items');
            $table->unsignedInteger('idEtapa')->nullable();
            $table->foreign('idEtapa')->references('id')->on('etapas');

            $table->string('documentosVerificador')->nullable();
            $table->longText('objetivoFactor')->nullable();
            $table->longText('aspecto')->nullable();
            $table->string('criticidad')->nullable();

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
        Schema::dropIfExists('preguntas');
    }
}
