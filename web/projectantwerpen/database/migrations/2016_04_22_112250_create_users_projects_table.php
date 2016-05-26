<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_user')->unsigned();
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('fk_project')->unsigned();
            $table->foreign('fk_project')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::drop('users_projects');
    }
}
