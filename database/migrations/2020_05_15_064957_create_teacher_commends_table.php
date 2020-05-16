<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherCommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_commends', function (Blueprint $table) {
            $table->bigIncrements('id');
                $table->mediumText('comment')->nullable()->comment('نص التعليق');
                $table->string('tag')->nullable()->comment('اختصار التعليق كلمة واحدة');
                $table->smallInteger('vote')->nullable()->comment('عدد مرات الاستخدام للتعليق');
                ##
                $table->bigInteger('teacher_id')->unsigned()->comment('رقم المعلم صاحب التعليق');
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
        Schema::dropIfExists('teacher_commends');
    }
}
