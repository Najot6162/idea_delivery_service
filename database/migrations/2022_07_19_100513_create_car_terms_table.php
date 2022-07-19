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
        Schema::create('car_terms', function (Blueprint $table) {
            $table->id();
            $table->string('car_model_id')->nullable();
            $table->string('insure_date')->nullable();
            $table->string('attorney_date')->nullable();
            $table->string('attorney')->nullable();
            $table->string('adver_date')->nullable();
            $table->string('technical_date')->nullable();
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
        Schema::dropIfExists('car_terms');
    }
};
