<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets',function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction')->unique();
            $table->integer('game_id');
            $table->integer('user_id');
            $table->decimal('amount', 11, 2);
            $table->string('bet_on');
            $table->string('odds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
