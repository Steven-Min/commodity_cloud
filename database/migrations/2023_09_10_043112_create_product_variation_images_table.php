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
        Schema::create('product_variation_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_variation_id')->unsigned()->comment('商品バリエーションID');
            $table->foreign('product_variation_id')->references('id')->on('product_variations')->onDelete('cascade');
            $table->string('image')->comment('商品バリエーション画像のパス');
            $table->integer('order')->comment('商品バリエーション画像の表示順');
            $table->tinyInteger('is_default')->default(0)->comment('デフォルトの商品バリエーション画像かどうか');
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
        Schema::dropIfExists('product_variation_images');
    }
};
