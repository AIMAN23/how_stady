<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // مجريشن جدول المسؤل المالي 
        Schema::create('financials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->rememberToken();
            // relation
            $table->string('school_id')->unsigned();
            $table->string('address_id')->unsigned();
            // timestamp
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
        Schema::dropIfExists('financials');
    }
}
