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
        Schema::create('variation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('バリエーションタイプ名');
            $table->longText('description')->comment('バリエーションタイプの説明');
            $table->bigInteger('user_id')->unsigned()->comment('出品者のユーザーID');
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
        Schema::dropIfExists('variation_types');
    }
};
