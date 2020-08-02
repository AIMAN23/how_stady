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
            $table->string('code')->comment('كود المادة');
            $table->string('description')->nullable()->comment('وصف المادة إن وجد');
            // relation
            $table->integer('school_id')->unsigned()->default(0);
            $table->integer('level_id')->unsigned()->default(0);
            $table->integer('teacher_id')->unsigned()->default(0)->comment('رقم مدرس المادة');
            // timestamp
            ## times
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
        Schema::dropIfExists('subjctes');
    }
}
