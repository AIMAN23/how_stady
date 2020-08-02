<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreeTaypsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_tayps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tayp')->nullable()->comment('نوع الدرجة');
            $table->tinyInteger('belongs')->nullable()->comment('الرقم 1 يعني شهري و2 يعني نهائي');
            ## العلاقات
            $table->bigInteger('school_id')->unsigned()->comment('رقم المدرسة');
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
        Schema::dropIfExists('degree_tayps');
    }
}
