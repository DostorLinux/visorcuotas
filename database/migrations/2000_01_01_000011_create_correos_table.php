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
        Schema::create('correos', function (Blueprint $table) {
            $table->id();
            $table->string('receptor', 255)->nullable(false);
            $table->string('asunto', 255)->nullable(false);
            $table->string('contenido', 255)->nullable(false);
            $table->boolean('enviado')->nullable(false)->default(false);
            $table->text('error')->nullable(true);
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
        Schema::drop('correos');
    }
};
