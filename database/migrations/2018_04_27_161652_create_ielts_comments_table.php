<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeltsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ielts_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ielts_id');
            $table->string('name');
            $table->text('body');            
            $table->timestamps();
        });

        Schema::table('ielts_comments', function($table){
            $table->foreign('ielts_id')->references('id')->on('ielts')->onDelete('cascade');
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ielts_comments');
        Schema::dropForeign(['blog_id']);

    }
}
