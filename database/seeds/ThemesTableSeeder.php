<?php

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            [
            'id' => '1',
            'title' => 'こんな雨天中止は嫌だ。',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            'title' => '貞子の唯一の悩みは?',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '3',
            'title' => 'SEの男性に言われがちなこと。',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                 [
            'id' => '4',
            'title' => '雨の日に遭遇するモンスターってなーあに。',
            'created_at' => now(),
            'updated_at' => now(),
                ],
            ]);
    }
}
