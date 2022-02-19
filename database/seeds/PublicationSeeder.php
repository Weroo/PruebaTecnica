<?php

use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publications')->insert([
            'author' => 'Autor',
            'title' => 'Titulo de la publicacion',
            'body' => 'Publication body...',
            'numComments' => 0
        ]);
    }
}
