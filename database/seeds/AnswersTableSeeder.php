<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            [
            'theme_id' => '1',
            'id' => '1',
            'body' => '最強の雨男が来るという情報が入ったから',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            
                [
            'theme_id' => '2',
            'id' => '2',
            'body' => '髪の毛が傘の骨に引っかかること',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'theme_id' => '3',
            'id' => '3',
            'body' => '恋愛までプログラムしなくていいから。',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'theme_id' => '4',
            'id' => '4',
            'body' => '階段で傘を向けてくるモンスター。',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'theme_id' => '4',
            'id' => '5',
            'body' => '店の傘たてにスタバのゴミ投入モンスター。',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                
            ]);
    }
}
