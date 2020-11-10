<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniq_session')->comment('Using chat session');
            $table->string('answer');
            $table->integer('question_sets_id')->unsigned();
            $table->foreign('question_sets_id')->references('id')->on('question_sets')->onDelete('cascade')->onUpdate('NO ACTION');
            $table->integer('users_id')->unsigned()->nullable()->comment('Using for if customer is logged in');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['uniq_session', 'question_sets_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_answers');
    }
}
