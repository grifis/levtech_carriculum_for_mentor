<?php

use Illuminate\Database\Seeder;

class KasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kasa')->insert([
        'id'=>1, 
		'name'=> '東京',
		'lat'=>35.6954806,
		'lng'=> 139.76325010000005,
		'count'=> 0,
		'created_at' => now(),
        'updated_at' => now(),
		]);
    }
}
