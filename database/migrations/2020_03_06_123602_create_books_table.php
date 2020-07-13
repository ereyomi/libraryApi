<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->unsignedBigInteger('user_id'); 
            $table->string('name');
            $table->string('description', 1000);
            $table->unsignedBigInteger('isbn');
            $table->unsignedBigInteger('college_id');
            $table->integer('status')->unsigned();            
            $table->string('cover');
            $table->integer('rating')->unsigned();  
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('college_id')->references('id')->on('colleges');
        });

        // Schema::table('books', function($table) {
        //     $table->foreign('librarian_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
