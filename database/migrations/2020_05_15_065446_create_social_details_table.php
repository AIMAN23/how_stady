<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('order_in_family')->nullable()->comment('ترتيب الطالب بين اخوانة 1 2 3 4 5 ..الخ');
            $table->tinyInteger('educational_father')->nullable()->comment('تعليم الاب 1 جامعي 2 ثانوي 3 اساسي 4 غير متعلم');
            $table->tinyInteger('educational_mother')->nullable()->comment('تعليم الام 1 جامعي 2 ثانوي 3 اساسي 4 غير متعلم');
            $table->tinyInteger('live_with')->nullable()->comment('يعيش 1 مع اسرتة 2 اقاربة 3 منفرد');
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
        Schema::dropIfExists('social_details');
    }
}
