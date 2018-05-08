<?php

use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([
            ['id' => 1, 'name' => 'Tiggo (T11)', 'make_id' => 1],
            ['id' => 2, 'name' => 'Actyon', 'make_id' => 2],
            ['id' => 3, 'name' => 'Creta', 'make_id' =>	3],
            ['id' => 4, 'name' => 'X1', 'make_id' => 4],
            ['id' => 5, 'name' => 'Tucson', 'make_id' => 3],
            ['id' => 6, 'name' => 'cee\'d', 'make_id' => 5],
            ['id' => 7, 'name' => 'Mondeo', 'make_id' =>	6],
            ['id' => 8, 'name' => 'Corolla', 'make_id' =>	7],
            ['id' => 9, 'name' => 'X5', 'make_id' =>	4],
            ['id' => 10, 'name' => 'Solaris', 'make_id' =>	3],
            ['id' => 11, 'name' => 'Pajero', 'make_id' =>	8],
            ['id' => 12, 'name' => 'Teana', 'make_id' =>	9],
            ['id' => 13, 'name' => 'Solano', 'make_id' => 10],
            ['id' => 14, 'name' => 'Passat CC', 'make_id' => 11],
        ]);
    }
}
