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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('商品名');
            $table->string('sku')->comment('商品コード');
            $table->longText('description')->comment('商品説明');
            $table->integer('base_price')->comment('ベースとなる価格');
            $table->string('default_image')->nullable()->comment('デフォルトの商品画像のパスやURL');
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
        Schema::dropIfExists('products');
    }
};
