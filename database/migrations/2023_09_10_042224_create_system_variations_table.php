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
        Schema::create('system_variations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('system_variation_type_id')->unsigned()->comment('バリエーションタイプID');
            $table->foreign('system_variation_type_id')->references('id')->on('system_variation_types')->onDelete('cascade');
            $table->string('name')->comment('バリエーション名');
            $table->longText('description')->comment('バリエーションの説明');
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
        Schema::dropIfExists('system_variations');
    }
};
