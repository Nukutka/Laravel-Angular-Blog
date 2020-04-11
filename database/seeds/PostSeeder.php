<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        $user1 = User::where('name', 'user1')->first();
        $categoryFilm =  Category::where('name', 'Кино')->first();
        $categorySport =  Category::where('name', 'Спорт')->first();

        DB::table('posts')->insert([
            'title' => 'Новость про кино 1',
            'body' => 'Текст новости про кино 1',
            'category_id' => $categoryFilm->id,
            'user_id' => $user1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('posts')->insert([
            'title' => 'Новость про кино 2',
            'body' => 'Текст новости про кино 2',
            'category_id' => $categoryFilm->id,
            'user_id' => $user1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('posts')->insert([
            'title' => 'Новость про спорт 1',
            'body' => 'Текст новости про спорт 1',
            'category_id' => $categorySport->id,
            'user_id' => $user1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
