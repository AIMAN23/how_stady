<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('autocomment')->nullable()->comment('تعليق يقوم النظام بعملة تلقائي');
            $table->mediumText('comment')->nullable()->comment('التعليق الخاص بالمعلم');
            $table->tinyInteger('status')->default(0)->comment('حالت المشاهدة للتعليق من ولي الامر 0 لم يتم مشاهدته 1 تم مشاهدته');
            $table->date('show_comment_at')->default(date('Y-m-d H:i:s'))->comment('وقت مشاهدة التعليق من قبل ولي الامر');
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
        Schema::dropIfExists('student_reports');
    }
}
