<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PostsTableSeeder::class);

//        for ($i = 0; $i < 30; $i++){
//        factory(App\User::class)->make();
//        }
//
//        for ($i = 0; $i < 30; $i++){
//            factory(App\Post::class)->make();
//        }

    }
}
