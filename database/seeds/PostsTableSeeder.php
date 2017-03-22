<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->title,
                'body' => $faker->paragraphs(3, true),
                'created_at' => time(),
                'category_id' => rand(1, 3),
                'user_id' => rand(1, 10)
            ]);
        }
    }
}
