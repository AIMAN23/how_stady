<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ## جدول الصور
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no')->nullable();
            $table->integer('status')->default(0)->comment('حالة التفعيل للصورة');
            $table->string('img')->default('user.jpg')->comment('عنوان الصورة');
            
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
        Schema::dropIfExists('images');
    }
}
