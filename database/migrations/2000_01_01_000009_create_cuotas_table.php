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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidad_id')->constrained('unidades')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('recurso_id')->constrained('recursos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('zona_id')->constrained('zonas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('tipo_asignacion_id')->constrained('tipos_asignacion')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('cuotas');
    }
};
