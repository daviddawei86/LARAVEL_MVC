<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToSalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sala', function (Blueprint $table) {
            $table->integer('local_id')->unsigned(); 
            $table->foreign('local_id')->references('id')->on('local')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sala', function (Blueprint $table) {
            //
        });
    }
}
