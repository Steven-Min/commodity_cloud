<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sub_categories')->truncate();

        DB::table('sub_categories')->insert([
            [
                'name' => 'ファッション',
                'slug' => 'fashion',
                'description' => 'ファッション',
                'image' => '',
                'sort' => 1,
                'category_id' => 1,
            ],
            [
                'name' => '美容・コスメ',
                'slug' => 'beauty',
                'description' => '美容・コスメ',
                'image' => '',
                'sort' => 2,
                'category_id' => 1,
            ],
            [
                'name' => '健康・ウェルネス',
                'slug' => 'health',
                'description' => '健康・ウェルネス',
                'image' => '',
                'sort' => 3,
                'category_id' => 1,
            ],
            [
                'name' => '生活・インテリア',
                'slug' => 'life',
                'description' => '生活・インテリア',
                'image' => '',
                'sort' => 4,
                'category_id' => 1,
            ],
            [
                'name' => 'テクノロジー',
                'slug' => 'technology',
                'description' => 'テクノロジー',
                'image' => '',
                'sort' => 5,
                'category_id' => 1,
            ],
            [
                'name' => '趣味・娯楽',
                'slug' => 'hobby',
                'description' => '趣味・娯楽',
                'image' => '',
                'sort' => 6,
                'category_id' => 1,
            ],
            [
                'name' => 'マタニティ・ベビー',
                'slug' => 'maternity',
                'description' => 'マタニティ・ベビー',
                'image' => '',
                'sort' => 7,
                'category_id' => 1,
            ],

            // 男性向け
            [
                'name' => 'ファッション',
                'slug' => 'fashion',
                'description' => 'ファッション',
                'image' => '',
                'sort' => 1,
                'category_id' => 2,
            ],
            [
                'name' => 'グルーミング',
                'slug' => 'grooming',
                'description' => 'グルーミング',
                'image' => '',
                'sort' => 2,
                'category_id' => 2,
            ],
            [
                'name' => 'スポーツ・フィットネス',
                'slug' => 'sports',
                'description' => 'スポーツ・フィットネス',
                'image' => '',
                'sort' => 3,
                'category_id' => 2,
            ],
            [
                'name' => 'テクノロジー',
                'slug' => 'technology',
                'description' => 'テクノロジー',
                'image' => '',
                'sort' => 4,
                'category_id' => 2,
            ],
            [
                'name' => '趣味・娯楽',
                'slug' => 'hobby',
                'description' => '趣味・娯楽',
                'image' => '',
                'sort' => 5,
                'category_id' => 2,
            ],
            [
                'name' => 'カー＆バイク',
                'slug' => 'car',
                'description' => 'カー＆バイク',
                'image' => '',
                'sort' => 6,
                'category_id' => 2,
            ],
            [
                'name' => 'ホーム＆リビング',
                'slug' => 'home',
                'description' => 'ホーム＆リビング',
                'image' => '',
                'sort' => 7,
                'category_id' => 2,
            ],

            // KIDS向け
            [
                'name' => '服・ファッション',
                'slug' => 'fashion',
                'description' => '服・ファッション',
                'image' => '',
                'sort' => 1,
                'category_id' => 3,
            ],
            [
                'name' => 'おもちゃ・ゲーム',
                'slug' => 'toy',
                'description' => 'おもちゃ・ゲーム',
                'image' => '',
                'sort' => 2,
                'category_id' => 3,
            ],
            [
                'name' => '学習・教育',
                'slug' => 'study',
                'description' => '学習・教育',
                'image' => '',
                'sort' => 3,
                'category_id' => 3,
            ],
            [
                'name' => 'スポーツ・アウトドア',
                'slug' => 'sports',
                'description' => 'スポーツ・アウトドア',
                'image' => '',
                'sort' => 4,
                'category_id' => 3,
            ],
            [
                'name' => '健康・ケア',
                'slug' => 'health',
                'description' => '健康・ケア',
                'image' => '',
                'sort' => 5,
                'category_id' => 3,
            ],
            [
                'name' => '食品・スナック',
                'slug' => 'food',
                'description' => '食品・スナック',
                'image' => '',
                'sort' => 6,
                'category_id' => 3,
            ],
            [
                'name' => 'エンターテインメント',
                'slug' => 'entertainment',
                'description' => 'エンターテインメント',
                'image' => '',
                'sort' => 7,
                'category_id' => 3,
            ],

            // BABY向け
            [
                'name' => 'ベビー服・アパレル',
                'slug' => 'fashion',
                'description' => 'ベビー服・アパレル',
                'image' => '',
                'sort' => 1,
                'category_id' => 4,
            ],
            [
                'name' => 'フィーディング（授乳・食事）',
                'slug' => 'feeding',
                'description' => 'フィーディング（授乳・食事）',
                'image' => '',
                'sort' => 2,
                'category_id' => 4,
            ],
            [
                'name' => 'ベビーケア',
                'slug' => 'baby-care',
                'description' => 'ベビーケア',
                'image' => '',
                'sort' => 3,
                'category_id' => 4,
            ],
            [
                'name' => 'ベビーギア',
                'slug' => 'baby-gear',
                'description' => 'ベビーギア',
                'image' => '',
                'sort' => 4,
                'category_id' => 4,
            ],
            [
                'name' => 'オムツ替え・トイレトレーニング',
                'slug' => 'diaper',
                'description' => 'オムツ替え・トイレトレーニング',
                'image' => '',
                'sort' => 5,
                'category_id' => 4,
            ],
            [
                'name' => '教育・遊び',
                'slug' => 'education',
                'description' => '教育・遊び',
                'image' => '',
                'sort' => 6,
                'category_id' => 4,
            ],
            [
                'name' => '安全・監視',
                'slug' => 'safety',
                'description' => '安全・監視',
                'image' => '',
                'sort' => 7,
                'category_id' => 4,
            ],
            [
                'name' => 'スキンケア',
                'slug' => 'skin-care',
                'description' => 'スキンケア',
                'image' => '',
                'sort' => 8,
                'category_id' => 4,
            ],
        ]);
    }
}
