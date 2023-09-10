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
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('variation_type_id')->unsigned()->comment('バリエーションタイプID');
            $table->foreign('variation_type_id')->references('id')->on('variation_types')->onDelete('cascade');
            $table->string('name')->comment('バリエーション名');
            $table->longText('description')->comment('バリエーションの説明');
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
        Schema::dropIfExists('variations');
    }
};
