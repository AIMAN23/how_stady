<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no')->nullable();
            $table->uuid('uuid')->unique();
            ## حالة تفعيل حساب المدرسة
            $table->integer('status')->default(55)
            ->comment('1=>free seting step 1  true,
                       2=>free step 2  true,
                       3=>free step 3  true,
                       9=>end time use acount free school,
                       ...,,,
                       ..,
                       99=>end time acount pro school,
                       100=>block acount school,
                    ');
            ### البيانات الاساسية للمدرسة
            $table->string('name');
            $table->string('bransh')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('wep')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('logo')->nullable()->default('logo-school.png');
            ### رابط العلاقة مع جدول العناوين
            $table->bigInteger('address_id')->unsigned();
            ### كلمة السر
            $table->string('password');
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
        Schema::dropIfExists('schools');
    }
}
