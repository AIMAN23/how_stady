<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->tinyInteger('status')->default(0)->comment('حالة تفعيل المرحلة الدراسية');
            $table->string('name')->nullable()->comment('اسم المرحلة في المدرسة');
            $table->string('code_in_school')->nullable()->comment('رمز المرحلة في كل مدرسة');
            $table->string('code')->nullable()->comment('رمز المرحلة العام لكل المراحل');
            $table->string('description')->nullable();
            // relation
            $table->biginteger('school_id')->unsigned();
            $table->biginteger('supervisor_id')->unsigned()->comment('مشرف المرحلة');
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
        Schema::dropIfExists('levels');
    }
}
