<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SchoolsTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Many to Many
            $table->bigInteger('school_id')->unsigned()->default(0)->comment('');
            $table->bigInteger('teacher_id')->unsigned()->default(0);
            
            
            // One to Many
            $table->bigInteger('level_id')->unsigned()->default(0)->comment('');
            $table->bigInteger('subjcte_id')->unsigned()->default(0)->comment('');
            // 
            $table->string('code')->nullable()->comment('كود تفعيل حساب المعلم في المدرسة');
            $table->tinyInteger('status')->nullable()->default(0)->comment('حالة تفعيل الحساب');
            // 
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('subjcte_id')->references('id')->on('subjctes')->onDelete('cascade');
            // 
            $table->timestamp('added_on')->nullable();
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('schools_teachers');
    }
}
