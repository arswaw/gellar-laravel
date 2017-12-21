<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLabelsToTodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('labels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('color');
            $table->timestamps();
        });

        Schema::create('label_todo', function (Blueprint $table) {
            $table->integer('todo_id');
            $table->integer('label_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            Schema::dropIfExists('label_todo');
            Schema::dropIfExists('labels');
        });
    }
}
