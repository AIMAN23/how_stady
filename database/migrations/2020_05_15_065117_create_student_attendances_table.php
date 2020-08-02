<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('attendance')->default(0)->comment('تحظير الطالب 0 لم يتم ادخال التحظير 1 حاظر 2 غائب بدون عذر 3 غائب بعذر');
            $table->datetime('datetime')->default(date('Y-m-d'))->comment('تاريخ التحظير');
            ##
            $table->bigInteger('student_register_id')->unsigned()->comment('رقم السجل للطالب');
            $table->bigInteger('teacher_id')->unsigned()->comment('رقم المعلم');
            $table->bigInteger('student_report_id')->unsigned()->comment('رقم التقرير تلقائي لعملية التحظير اليومية حسب نوع التحظير');
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
        Schema::dropIfExists('student_attendances');
    }
}
