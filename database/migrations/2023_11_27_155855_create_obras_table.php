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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('breveDescricao')->nullable();
            $table->text('sinopse')->nullable();
            $table->string('dataPubicacao')->nullable();
            $table->string('obra_img')->nullable();
            $table->boolean('pendente');
            $table->unsignedBigInteger('idAutor');
            $table->foreign('idAutor')->references('id')->on('autors')->cascadeOnDelete()->cascadeOnUpdate();
            

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
        Schema::dropIfExists('obras');
    }
};
