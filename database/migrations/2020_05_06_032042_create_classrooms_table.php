<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->string('name')->nullable()->comment('اسم الشعبة الدراسية');
            $table->string('code')->nullable()->comment('رمز الشعبة الدراسية');
            // relation
            $table->integer('school_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('teacher_id')->unsigned()->comment('مربي الفصل');
            // timestamp
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
        Schema::dropIfExists('classrooms');
    }
}
