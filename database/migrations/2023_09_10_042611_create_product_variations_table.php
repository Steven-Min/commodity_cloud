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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->comment('商品ID');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('variation_id')->unsigned()->comment('バリエーションID');
            $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->comment('出品者のユーザーID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('price')->nullable()->comment('オプション: 個別のバリエーションで価格が異なる場合');
            $table->integer('stock')->nullable()->comment('フリー在庫数');
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
        Schema::dropIfExists('product_variations');
    }
};
