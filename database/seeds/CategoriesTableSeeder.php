<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=>'PHP','created_at'=>time()],
            ['name'=>'Laravel','created_at'=>time()],
            ['name'=>'C#','created_at'=>time()]

        ]);
    }
}
