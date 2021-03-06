<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatterDiscussionTable extends Migration
{
    public function up()
    {
        Schema::create('chatter_discussion', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('chatter_category_id')->default('1');
            $table->string('title');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->boolean('sticky')->default(false);
            $table->integer('views')->unsigned()->default('0');
            $table->boolean('answered')->default(0);
            $table->timestamps();


            $table->foreign('chatter_category_id')
                ->references('id')
                ->on('chatter_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('chatter_discussion');
    }
}
