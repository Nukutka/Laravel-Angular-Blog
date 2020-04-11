<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'kek@kek.ru',
            'password' => Hash::make('user1'),
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
