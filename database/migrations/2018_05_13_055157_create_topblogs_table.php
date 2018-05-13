<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopblogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topblogs', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('category_id');
        $table->string('title');
        $table->text('body');
        $table->string('image');
        $table->string('book')->nullable();
        $table->integer('visit_count')->default(0);
        $table->string('video')->nullable();
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
        Schema::dropIfExists('topblogs');
    }
}