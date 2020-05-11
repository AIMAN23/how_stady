<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjctesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjctes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('اسم المادة');
            $table->string('description')->nullable()->comment('وصف المادة إن وجد');
            // relation
            $table->integer('school_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('teacher_id')->unsigned()->comment('رقم مدرس المادة');
            // timestamp
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
        Schema::dropIfExists('subjctes');
    }
}
