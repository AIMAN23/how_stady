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
            $table->uuid('uuid')->unique();
            $table->string('name')->nullable()->comment('اسم مسئول النظام للمدرسة');
            $table->string('mobile')->unique()->comment('رقم التلفون ');
            $table->string('email')->nullable()->comment('الايميل');
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->nullable()->comment('حالت تفعيل الحساب 1والغاءالحساب 2');
            $table->string('password')->nullable()->comment('كلمت مرور ');
            $table->rememberToken();
            ## العلاقات الخاصة للجدول
            $table->bigInteger('image_id')->unsigned()->comment('رقم الصورة في جدول الصور');
            $table->bigInteger('address_id')->unsigned()->comment('رفم العنوان في جدول العناوين');
            $table->bigInteger('school_id')->unsigned()->comment('رقم المدرسة في جدول المدارس');
            ## تاريخ الاظافة و التعديل لكل سطر في الجدول
            $table->timestamps();
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
