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
            $table->string('no')->nullable();
            $table->uuid('uuid')->unique()->comment('رقم عشوائي 16');
            $table->integer('status')->default(0)->comment('حالة التفعيل للحساب');
            
            $table->string('name')->nullable()->comment('اسم الطالب كامل');
            $table->string('f_name')->nullable()->comment('الاسم الاول');
            $table->string('p_name')->nullable()->comment('اسم الاب');
            $table->string('l_name')->nullable()->comment('الاسم الاخير');

            $table->tinyInteger('gender')->nullable()->comment('1 male 2 fmale الجنس');
            $table->string('nationality')->nullable()->comment('الجنسية');
            $table->date('birthdate')->nullable()->comment('تاريخ الميلاد');
            $table->string('email')->nullable()->comment('الايميل');
            $table->string('mobile')->unique()->nullable()->comment('رقم الهاتف');

            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->comment('remember_token');
            $table->string('password')->nullable()->comment('كلمت مرور');
            ## المفاتيح الاجنبية FK
            $table->bigInteger('image_id')->unsigned()->default(0);
            $table->bigInteger('address_id')->unsigned()->default(0)->comment('العنوان');
            $table->bigInteger('socialdetail_id')->unsigned()->default(0)->comment('المعلومات الاجتماعية');
            $table->bigInteger('healthdetail_id')->unsigned()->default(0)->comment('المعلومات الصحية');
            // timestamp
            ## times
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('added_on')->nullable();
            $table->timestamp('read_at')->nullable();
            
            // relation
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
