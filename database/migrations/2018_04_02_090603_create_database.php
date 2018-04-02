<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 50)->nullable();
            $table->string('school', 50);
            $table->string('phone_number', 20);
            $table->unsignedInteger('birth_year');
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('correct_answer', 1);
            $table->unsignedTinyInteger('lever');
            $table->timestamps();
        });

        Schema::create('user_question', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('question_id');
            $table->string('answer', 1);
            $table->unsignedInteger('order_number');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('user_question');
    }
}
