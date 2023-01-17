<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos_cuotas', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('unidad', 255);
            $table->string('recurso', 255);
            $table->string('zona', 255);
            $table->string('tipo_asignacion', 255);
            $table->string('organizacion_titular', 255)->nullable(false);
            $table->integer('anno')->nullable(false);
            $table->date('inicio_periodo', 255)->nullable(false);
            $table->date('fin_periodo', 255)->nullable(false);
            $table->bigInteger('cuota')->nullable(false);
            $table->bigInteger('cesiones_descuentos')->nullable(false);
            $table->bigInteger('cuota_efectiva')->nullable(false);
            $table->bigInteger('captura')->nullable(false);
            $table->bigInteger('saldo')->nullable(false);
            $table->integer('porcentaje_consumo')->nullable(false);
            $table->date('cierre')->nullable(true);
            $table->date('preliminar')->nullable(true);
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
        Schema::dropIfExists('historicos_cuotas');
    }
};
