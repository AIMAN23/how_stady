<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('month')->nullable()->comment('اسم الشهر الدراسي');
            $table->tinyInteger('school_id')->unsigned()->comment('رقم المدرسة');
            
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
        Schema::dropIfExists('months');
    }
}
