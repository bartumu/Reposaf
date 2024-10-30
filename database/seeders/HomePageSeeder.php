<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('home_pages')->insert([
            ['titulo' => 'REPOSAF', 'slogan' => 'REPOSITÓRIO PARA SEUS ARTIGOS E LIVROS', 'descricao' => 'Somos uma plataforma que visa a transformar o formato do conhecimento 
            e proliferar a forma como lidamos com o mundo e a sua evolução, partilhe connosco e com mundo, o seu conhecimento', 'img_logo' => 'front_endimageslogo_r1.png'],
        ]);

    }
}
