<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_year')->nullable()->comment('السنة الدراسية');
            $table->string('img')->nullable()->comment('صورة الطالب في المستوى الحالي');
            $table->tinyInteger('status')->default(2)->comment('الحالة 0 راسب و1 ناجح والافتراضي 2 يدرس حاليا في نفس المستوى');
            ##
            $table->bigInteger('student_id')->nullable()->comment('رقم الطالب');
            $table->bigInteger('school_id')->nullable()->comment('رقم المدرسة');
            $table->bigInteger('level_id')->nullable()->comment('رقم المستوى');
            $table->bigInteger('classroom_id')->nullable()->comment('رقم الشعبة الدراسي');
            $table->bigInteger('schooladmin_id')->nullable()->comment('رقم المسئول المدرسي الذي سجل الطالب');
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
        Schema::dropIfExists('student_registers');
    }
}
