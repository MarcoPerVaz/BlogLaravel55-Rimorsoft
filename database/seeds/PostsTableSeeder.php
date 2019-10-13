<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Crear posts con relación a etiquetas */
        /* Dónde each es cada */
        /* Dónde attach es adjuntar */
        /* Dónde rand es random o aleatorio */
        factory( App\Post::class, 300 )->create()->each( function( App\Post $post ) {

            $post->tags()->attach( [

                rand( 1, 5 ),
                rand( 6, 14 ),
                rand( 15, 20 ),

            ] );
            
        }); /* Se crean 300 posts */
    }
}
