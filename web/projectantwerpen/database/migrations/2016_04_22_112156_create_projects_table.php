<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titel');
            $table->string('categorie');
            $table->text('uitleg');
            $table->text('fotonaam');
            $table->text('locatie');
            $table->date('einddatum');
            $table->double('kostprijs');
            $table->integer('fase');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->integer('aantal_bekeken');
            $table->text('vraag');
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
        Schema::drop('projects');
    }
}
