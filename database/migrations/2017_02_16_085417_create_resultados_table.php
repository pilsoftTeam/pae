<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idAsignacion');
            $table->foreign('idAsignacion')->references('id')->on('asignaciones');
            $table->unsignedInteger('idItem');
            $table->foreign('idItem')->references('id')->on('items');
            $table->unsignedInteger('idAgrupacion')->nullable();
            $table->foreign('idAgrupacion')->references('id')->on('etapas');
            $table->unsignedInteger('idEvaluacion');
            $table->foreign('idEvaluacion')->references('id')->on('evaluaciones');
            $table->string('valor')->nullable();
            $table->longText('observacion')->nullable();
            $table->longText('rutaDocumentos')->nullable();
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
        Schema::dropIfExists('resultados');
    }
}
