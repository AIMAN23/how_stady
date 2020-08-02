<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolAdminsTable extends Migration
{
    /**
     * Run the migrations.
     * ### للتنفيذ المجريشن للجدول في قاعدة البيانات
     * @return void
     */
    public function up()
    {
        ### مجريشن جدول مسئول النظام للكل مدرسة
        Schema::create('school_admins', function (Blueprint $table) {
            ## البيانات الاساسية للجدول
            $table->bigIncrements('id');
            $table->string('no')->nullable();
            $table->uuid('uuid')->unique();
            $table->integer('status')->default(0)->comment('حالة التفعيل للحساب');

            $table->string('name')->nullable()->comment('الاسم كامل');
            $table->string('f_name')->nullable()->comment('الاسم الاول');
            $table->string('p_name')->nullable()->comment('اسم الاب');
            $table->string('l_name')->nullable()->comment('الاسم الاخير');
            
            $table->tinyInteger('gender')->nullable()->comment('1 male 2 fmale الجنس');
            $table->string('nationality')->nullable()->comment('الجنسية');
            $table->date('birthdate')->nullable()->comment('تاريخ الميلاد');
            
            $table->string('email')->unique()->nullable()->comment('الايميل');
            $table->string('mobile')->unique()->nullable()->comment('رقم الهاتف');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->comment('remember_token');
            $table->string('password');
            // relation
            $table->bigInteger('image_id')->unsigned()->default(0);
            $table->bigInteger('school_id')->unsigned()->default(0);
            $table->bigInteger('address_id')->unsigned()->default(0);
            // timestamp
            ## times
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('added_on')->nullable()->default(time());
        });
    }

    /**
     * Reverse the migrations.
     *### للتراجع عن انشاء المجريشن للجدول
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_admins');
    }
}
