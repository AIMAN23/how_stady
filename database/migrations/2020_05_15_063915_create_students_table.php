<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ##
        Schema::create('students', function (Blueprint $table) {
            ##
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique()->comment('رقم عشوائي 16');
            $table->string('f_name')->nullable()->comment('الاسم الاول');
            $table->string('p_name')->nullable()->comment('اسم الاب');
            $table->string('l_name')->nullable()->comment('الاسم الاخير');
            $table->string('name')->nullable()->comment('اسم الطالب كامل');
            $table->date('birthdate')->nullable()->comment('تاريخ الميلاد');
            $table->tinyInteger('gender')->nullable()->comment('1 male 2 fmale الجنس');
            $table->string('nationality')->nullable()->comment('الجنسية');
            $table->string('email')->nullable()->comment('الايميل');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->comment('كلمت مرور');
            $table->rememberToken();
            ## المفاتيح الاجنبية FK
            $table->bigInteger('address_id')->unsigned()->comment('العنوان');
            $table->bigInteger('socialdetail_id')->unsigned()->comment('المعلومات الاجتماعية');
            $table->bigInteger('healthdetail_id')->unsigned()->comment('المعلومات الصحية');
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
        Schema::dropIfExists('students');
    }
}
