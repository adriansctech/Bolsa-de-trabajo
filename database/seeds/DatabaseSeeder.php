<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    }
    public function seedCatalog()
        {
        DB::table('')->delete();

        foreach( $this->arrayPeliculas as $pelicula ) 
            {
                $p = new Movie;
                $p->title = $pelicula['title'];
                $p->year = $pelicula['year'];
                $p->director = $pelicula['director'];
                $p->poster = $pelicula['poster'];
                $p->rented = $pelicula['rented'];
                $p->synopsis = $pelicula['synopsis'];
                $p->save();
            }
        }
}
