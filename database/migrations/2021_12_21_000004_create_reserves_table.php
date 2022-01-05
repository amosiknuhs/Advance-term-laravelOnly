<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reserves', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users')->unique();
      $table->foreignId('shop_id')->constrained('shops')->unique();
      $table->date('date');
      $table->time('time');
      $table->integer('number');
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('reserves');
  }
}
