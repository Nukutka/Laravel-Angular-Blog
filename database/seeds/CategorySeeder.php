<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            'name' => 'Кино',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categories')->insert([
            'name' => 'Спорт',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categories')->insert([
            'name' => 'Новости',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categories')->insert([
            'name' => 'Экономика',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categories')->insert([
            'name' => 'Авто',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
