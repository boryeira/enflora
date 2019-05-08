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
      \DB::table('users')->insert(array (
          0 =>
          array (
              'id' => 1,
              'first_name' => 'enflora',
              'last_name' => 'admin',
              'email' => 'admin@enfloraclub.cl',
              'password' => bcrypt('flora123123'),
              'role_id' => 1,
              'created_at' => now(),
              'updated_at' => now(),
          ),
        ));
        factory(App\Models\User::class, 10)->create();

        \DB::table('strains')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Gorilla Glue #4',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array (
                'id' => 2,
                'name' => '2046',
                'created_at' => now(),
                'updated_at' => now(),
            ),
          ));

    }
}
