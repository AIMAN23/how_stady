<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('homework');
            // العلاقات
            $table->bigInteger('lesson_id')->unsigned();
            $table->bigInteger('subjcte_id')->unsigned();
            $table->bigInteger('classroom_id')->unsigned();
            // زمن الاظافة والتعديل
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('added_on')->nullable()->default(time());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_lessons');
    }
}
