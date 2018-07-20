<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovingColumnTitleAndDescriptionAndAddingAnswerAndQuestionInstead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('faqs', function($table) {
        $table->dropColumn('title');
        $table->dropColumn('description');
        $table->text('answer');
        $table->text('question');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $table->dropColumn('title');
      $table->dropColumn('description');
      $table->text('answer');
      $table->text('question');
    }
}
