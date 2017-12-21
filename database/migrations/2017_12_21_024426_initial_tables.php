<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title'); // Should be unique?
            $table->integer('author_id')->unsigned();
            $table->boolean('public')->default(0);
            $table->boolean('active')->default(1);
            $table->foreign('author_id')->references('id')->on('users');
            // $table->string('category'); What should this be called?
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->integer('board_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('board_id')->references('id')->on('boards')->onCascade('delete');
        });

        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->integer('category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->string('description');
            $table->boolean('is_completed')->default(1);
            $table->date('due_date');
            $table->boolean('pinned')->default(0);
            $table->enum('priority', ['HIGH','NORMAL','LOW']);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->string('color')->default('blue');
            $table->string('region');
            $table->integer('author_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('body');
            $table->integer('author_id')->unsigned();
            $table->integer('todo_id')->unique()->unsigned();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('file_name');
            $table->string('resolution')->nullable();
            $table->string('file_size')->nullable();
            $table->string('maker')->nullable();
            $table->integer('todo_id');
            $table->string('model')->nullable();
            $table->boolean('flash')->nullable();
            $table->string('focal_length')->nullable();
            $table->string('white_balance')->nullable();
            $table->string('aperture')->nullable();
            $table->integer('author_id')->unsigned();
            $table->string('exposure_time')->nullable();
            $table->integer('ISO')->nullable();
            $table->string('storage_URL')->unique();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('revisions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->string('field_changed');
            $table->string('old_value');
            $table->string('new_value');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
        });

        // Lookup Tables

        Schema::create('board_user', function (Blueprint $table) {
            $table->integer('board_id');
            $table->integer('user_id');
        });

        Schema::create('board_team', function (Blueprint $table) {
            $table->integer('board_id');
            $table->integer('team_id');
        });

        Schema::create('team_user', function (Blueprint $table) {
            $table->integer('team_id');
            $table->integer('user_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_user');
        Schema::dropIfExists('board_team');
        Schema::dropIfExists('board_user');
        Schema::dropIfExists('revisions');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('todos');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('boards');
    }
}
