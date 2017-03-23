<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'name'              => $faker->name,
                'email'             => $faker->safeEmail,
                'password'          => bcrypt(str_random(10)),
                'remember_token'    => str_random(10),
                'created_at'        => Carbon::now()
            ]);
        }


//        $faker = Faker::create();
//        foreach (range(1,10) as $index) {
//            DB::table('users')->insert([
//                'title'             => $faker->title,
//                'body'              => $faker->paragraphs,
//                'email'             => $faker->email,
//                'password'          => bcrypt(str_random(10)),
//                'created_at'        => time(),
//                'remember_token'    => str_random(10),
//                'category_id'       => rand(1,3),
//                'user_id'           => $index
//            ]);
//        }

    }
}
