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
        Schema::create('small_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('下位カテゴリー名');
            $table->string('slug')->nullable()->comment('スラッグ');
            $table->longText('description')->nullable()->comment('説明');
            $table->string('image')->nullable()->comment('画像');
            $table->unsignedBigInteger('sub_category_id')->nullable()->comment('サブカテゴリーID');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
        Schema::dropIfExists('small_categories');
    }
};
