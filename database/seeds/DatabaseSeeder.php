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
        factory(App\Models\User::class, 10)->create();

        \DB::table('strains')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Gorilla Glue #4',
                'created_at' => now(),
                'updated_at' => now(),
            ),
          ));
          
    }
}
