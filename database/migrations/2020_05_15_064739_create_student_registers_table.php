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
            $table->string('code')->nullable()->comment('رقم السجل الدراسي للطالب في المدرسة');
            $table->string('no')->nullable()->comment('رقم السجل الدراسي للطالب في النظام');
            $table->tinyInteger('status')->default(0)->comment('الحالة 2 راسب و1 ناجح والافتراضي 0 يدرس حاليا في نفس المستوى');
            
            $table->string('name')->nullable()->comment('اسم الطالب كامل');
            $table->string('img')->nullable()->comment('صورة الطالب في المستوى الحالي');
            
            $table->string('school_year')->nullable()->comment('السنة الدراسية');
            ##
            $table->bigInteger('student_id')->nullable()->default(0)->comment('رقم الطالب');
            $table->bigInteger('pareent_id')->nullable()->default(0)->comment('رقم ولي الامر');

            $table->bigInteger('school_id')->nullable()->default(0)->comment('رقم المدرسة');
            $table->bigInteger('level_id')->nullable()->default(0)->comment('رقم المستوى');
            $table->bigInteger('classroom_id')->nullable()->default(0)->comment('رقم الشعبة الدراسي');
            $table->bigInteger('school_admin_id')->nullable()->default(0)->comment('رقم المسئول المدرسي الذي سجل الطالب');
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
        Schema::dropIfExists('student_registers');
    }
}
