<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'name' => 'WOMEN',
                'slug' => 'women',
                'description' => '女性向けの商品です',
                'image' => 'las la-female',
                'sort' => 1,
            ],
            [
                'name' => 'MEN',
                'slug' => 'men',
                'description' => '男性向けの商品です',
                'image' => 'las la-male',
                'sort' => 2,
            ],
            [
                'name' => 'KIDS',
                'slug' => 'kids',
                'description' => '子供向けの商品です',
                'image' => 'las la-child',
                'sort' => 3,
            ],
            [
                'name' => 'BABY',
                'slug' => 'baby',
                'description' => '赤ちゃん向けの商品です',
                'image' => 'las la-baby',
                'sort' => 4,
            ],
        ]);
    }
}
