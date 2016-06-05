<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('type_of_user');
            $table->integer('level');
            $table->string('rank');
            $table->string('path_rank_image');
            $table->integer('XP');
            $table->integer('coins');
            $table->double('coin_multiplier', 3, 1);
            $table->integer('a_points');
            $table->boolean('boughtLikeUpgrade');
            $table->boolean('boughtDislikeUpgrade');
            $table->boolean('boughtCoinDoubler');
            $table->boolean('boughtExpDoubler');
            $table->integer('expPerLike');
            $table->integer('expPerDislike');
            $table->integer('coinsPerLike');
            $table->integer('coinsPerDislike');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
