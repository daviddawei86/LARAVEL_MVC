<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalmovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_movie', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

            $table->integer('local_id')->unsigned();
            $table->foreign('local_id')->references('id')->on('local')->onDelete('cascade');
            $table->integer('stock')->nullable();
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
        Schema::dropIfExists('localmovie');
    }
}
