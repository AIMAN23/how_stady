<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('degree')->nullable()->comment('الدرجة');
            ##
            $table->bigInteger('student_register_id')->unsigned()->comment('رقم السجل للطالب');
            $table->bigInteger('month_id')->unsigned()->comment('رقم الشهر الدراسي');
            $table->bigInteger('taypdegree_id')->unsigned()->comment('رقم نوع الدرجة');
            $table->bigInteger('subjcte_id')->unsigned()->comment('رقم المادة');
            $table->bigInteger('semester_id')->unsigned()->comment('رقم الفصل الدراسي');
            $table->bigInteger('student_report_id')->unsigned()->comment('رقم التقرير  لدرجة الطالب');
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
        Schema::dropIfExists('degrees');
    }
}
