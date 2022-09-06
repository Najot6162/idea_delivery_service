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
        Schema::create('pickup_times', function (Blueprint $table) {
            $table->id();
            $table->uuid('app_uuid');
            $table->integer('step');
            $table->integer('user_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('month_uniq')->nullable();
            $table->text('comment')->nullable();
            $table->integer('active')->default(0)->nullable();
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
