<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // =$this->call(SeederDePrueba::class);

        // DB::table('genres')->insert([
        //   "name" => "Experimental",
        //   "ranking" => 22
        // ]);

        factory(App\Pelicula::class, 50)->create();
    }
}
