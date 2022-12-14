<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relocation_products', function (Blueprint $table) {
            $table->id();
            $table->uuid('relocation_uuid');
            $table->string('product_name');
            $table->string('product_id');
            $table->string('imel');
            $table->string('imel_id');
            $table->integer('product_amount');
            $table->integer('product_code');
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
        Schema::dropIfExists('relocation_products');
    }
};
