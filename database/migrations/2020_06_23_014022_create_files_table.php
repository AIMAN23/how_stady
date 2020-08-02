<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no')->nullable()->comment('رقم السجل  للملف في النظام');
            $table->tinyInteger('status')->default(0)->comment('الحالة للملف');
            $table->string('filename')->nullable()->comment('اسم الملف');
            $table->string('path')->nullable()->comment('رابط الملف');
            $table->string('description')->nullable()->comment('وصف الملف');
            // 
            $table->bigInteger('school_id')->nullable()->default(0)->comment('رقم المدرسة');
            $table->bigInteger('school_admin_id')->nullable()->default(0)->comment('رقم الادمن');
            // 
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
        Schema::dropIfExists('files');
    }
}
