<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=20;$i++){
            DB::table('publicacion')->insert([
                'idUsuario' => "1",
                'titulo' => '[{"attributes":{"size":"large","color":"#a10000"},"insert":"Soy pepe el titulo '.$i.'"},{"insert":"\n"}]',
                'tituloSNFormato' => "Titulo random ".$i,
                'descripcion' => Str::random(10),
                'contenido' => '[{"insert":"Soy la publicacion with imagen '.$i.'"},{"attributes":{"code-block":true},"insert":"\n"}]',
                'created_at' => "2019-11-12"
            ]);
        }
    }
}
