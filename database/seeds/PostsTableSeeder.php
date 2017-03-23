<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
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
                'title' => $faker->text(50),
                'body' => $faker->paragraphs(3, true),
                'created_at' => Carbon::now(),
                'category_id' => rand(1, 3),
                'user_id' => rand(1, 10)
            ]);
        }
    }
}
