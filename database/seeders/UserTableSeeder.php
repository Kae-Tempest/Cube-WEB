<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create()->each(
            fn ($user) => $user->tweets()->saveMany(\App\Models\Tweet::factory(5)->make()),
        );
        \App\Models\Comment::factory(10)->create()->make();
    }
}
