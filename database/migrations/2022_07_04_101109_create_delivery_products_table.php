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
        Schema::create('delivery_products', function (Blueprint $table) {
            $table->id();
            $table->uuid('delivery_uuid');
            $table->string('product_name');
            $table->string('product_id');
            $table->string('imel');
            $table->string('imel_id');
            $table->string('product_amount');
            $table->integer('product_code');
            $table->string('address')->nullable();
            $table->string('sales');
            $table->string('sales_id');
            $table->integer('sales_id_our')->nullable();;;
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
        Schema::dropIfExists('delivery_products');
    }
};
