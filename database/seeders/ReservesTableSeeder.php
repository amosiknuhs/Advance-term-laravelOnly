<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReservesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $param = [
      'user_id' => 1,
      'shop_id' => 1,
      'date' => '2022-01-01',
      'time' => '17:00:00',
      'number' => 1,
    ];
    DB::table('reserves')->insert($param);
    $param = [
      'user_id' => 1,
      'shop_id' => 2,
      'date' => '2022-02-10',
      'time' => '18:00:00',
      'number' => 2,
    ];
    DB::table('reserves')->insert($param);
    $param = [
      'user_id' => 1,
      'shop_id' => 3,
      'date' => '2022-03-20',
      'time' => '19:00:00',
      'number' => 3,
    ];
    DB::table('reserves')->insert($param);
    $param = [
      'user_id' => 1,
      'shop_id' => 4,
      'date' => '2022-04-30',
      'time' => '20:00:00',
      'number' => 4,
    ];
    DB::table('reserves')->insert($param);
  }
}
