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
            $table->date('einddatum');
            $table->double('kostprijs');
            $table->integer('fase');
            $table->text('likes');
            $table->text('aantal_bekeken');
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
