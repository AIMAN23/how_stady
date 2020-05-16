<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('hearing')->nullable()->comment('السمع 1 جيد 2 متوسط 3 ضعيف');
            $table->tinyInteger('eyesight')->nullable()->comment('البصر 1 جيد 2 متوسط 3 ضعيف');
            $table->tinyInteger('pronunciation')->nullable()->comment('النطق 1 جيد 2متوسط 3 ضعيف');
            $table->tinyInteger('has_other')->nullable()->comment('هل يعاني من اعاقة اخرى 1 نعم و 2 لا');
            $table->string('other')->nullable()->comment('مرض اخر');
            ##
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
        Schema::dropIfExists('health_details');
    }
}
