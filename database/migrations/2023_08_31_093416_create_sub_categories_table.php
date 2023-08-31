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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('サブカテゴリー名');
            $table->string('slug')->nullable()->comment('スラッグ');
            $table->longText('description')->nullable()->comment('説明');
            $table->string('image')->nullable()->comment('画像');
            $table->unsignedBigInteger('category_id')->nullable()->comment('カテゴリーID');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('sort')->nullable()->comment('並び順');
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
        Schema::dropIfExists('sub_categories');
    }
};
