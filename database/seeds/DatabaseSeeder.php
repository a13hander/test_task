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
        $this->call(MakeSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(CarSeeder::class);
    }
}
