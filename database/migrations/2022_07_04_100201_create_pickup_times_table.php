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
        Schema::create('pickup_times', function (Blueprint $table) {
            $table->id();
            $table->integer('app_id');
            $table->integer('step')->nullable();
            $table->integer('user_id')->nullable();
            $table->datetime('date_pub')->nullable();
            $table->integer('month_uniq')->nullable();
            $table->text('comment')->nullable();
            $table->enum('active',['0','1'])->nullable();
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
        Schema::dropIfExists('pickup_times');
    }
};
