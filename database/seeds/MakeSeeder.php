<?php

use Illuminate\Database\Seeder;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('makes')->insert([
            ['id' => 1, 'name' => 'Chery'],
            ['id' => 2, 'name' => 'SsangYong'],
            ['id' => 3, 'name' => 'Hyundai'],
            ['id' => 4, 'name' => 'BMW'],
            ['id' => 5, 'name' => 'Kia'],
            ['id' => 6, 'name' => 'Ford'],
            ['id' => 7, 'name' => 'Toyota'],
            ['id' => 8, 'name' => 'Mitsubishi'],
            ['id' => 9, 'name' => 'Nissan'],
            ['id' => 10, 'name' => 'Lifan'],
            ['id' => 11, 'name' => 'Volkswagen'],
        ]);
    }
}
