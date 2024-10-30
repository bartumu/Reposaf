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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->default('REPOSAF');
            $table->string('slogan')->default('REPOSITÓRIO PARA SEUS ARTIGOS E LIVROS');
            $table->text('descricao')->default('Somos uma plataforma que visa a transformar o formato do conhecimento 
            e proliferar a forma como lidamos com o mundo e a sua evolução, partilhe connosco e com mundo, o seu conhecimento');
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
        Schema::dropIfExists('home_pages');
    }
};
