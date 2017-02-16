<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('nombreEvaluacion');
            $table->unsignedInteger('idItem');
            $table->foreign('idItem')->references('id')->on('items');
            $table->unsignedInteger('idEtapa')->nullable();
            $table->foreign('idEtapa')->references('id')->on('etapas');
            $table->unsignedInteger('idOpcionCumplimiento')->nullable();
            $table->foreign('idOpcionCumplimiento')->references('id')->on('estados_cumplimientos');
            $table->longText('tipo');
            $table->longText('criticidad')->nullable();
            $table->longText('documentosVerificadores')->nullable();
            $table->longText('aspectoEvaluativo')->nullable();
            $table->boolean('observacionEscrita')->default(false);
            $table->boolean('observacionDocumental')->default(false);
            $table->boolean('replicacion')->default(false);
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
        Schema::dropIfExists('evaluaciones');
    }
}
