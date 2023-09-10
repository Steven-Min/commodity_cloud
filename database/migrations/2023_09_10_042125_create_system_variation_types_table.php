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
        Schema::create('system_variation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('バリエーションタイプ名');
            $table->longText('description')->comment('バリエーションタイプの説明');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_variation_types');
    }
};
