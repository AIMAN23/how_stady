<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ## جدول الحصص لكل مستوى في المدارس
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lesson')->nullable()->comment('اسماء الحصص اليومية لكل مستوى');
            $table->time('start_time')->nullable()->comment('وقت بداية الحصة');
            $table->time('end_time')->nullable()->comment('وقت نهاية الحصة');
            ##
            $table->bigInteger('level_id')->unsigned()->comment('رقم المستوى');
            ## times
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('added_on')->nullable();
            $table->timestamp('read_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
