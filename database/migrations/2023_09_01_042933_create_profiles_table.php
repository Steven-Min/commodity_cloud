<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('zipcode')->nullable()->comment('郵便番号');
            $table->string('prefecture')->nullable()->comment('都道府県');
            $table->string('city')->nullable()->comment('市区町村');
            $table->string('address')->nullable()->comment('番地');
            $table->string('birthday')->nullable()->comment('生年月日');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->comment('性別');
            $table->boolean('available_notification')->default(false)->comment('定期お知らせを許可');
            $table->unsignedBigInteger('user_id')->nullable()->comment('ユーザーID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
};
