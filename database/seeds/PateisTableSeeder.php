<?php

use Illuminate\Database\Seeder;

class PateisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Pastel::class, 10)->create();
    }
}
