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
		],
		[
		  'id'=>2, 
		'name'=> '小川町駅',
		'lat'=>35.69496,
		'lng'=> 139.76746000000003,
		'count'=> 0,
		'created_at' => now(),
        'updated_at' => now(),   
		],
		[
		  'id'=>3, 
		'name'=> '御茶ノ水駅',
		'lat'=>35.6993529,
		'lng'=> 139.76526949999993,
		'count'=> 8,
		'created_at' => now(),
        'updated_at' => now(),   
		],
		[
		  'id'=>4, 
		'name'=> '神保町駅',
		'lat'=>35.695932,
		'lng'=> 139.75762699999996,
		'count'=> 4,
		'created_at' => now(),
        'updated_at' => now(),   
		],
		[
		  'id'=>5, 
		'name'=> '新御茶ノ水駅',
		'lat'=>35.696932,
		'lng'=> 139.76543200000003,
		'count'=> 1,
		'created_at' => now(),
        'updated_at' => now(),   
		],
		
		);
    }
}
