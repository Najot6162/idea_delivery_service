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
        Schema::create('delivery_apps', function (Blueprint $table) {
            $table->id();
            $table->string('agent_id', 255);
            $table->datetime('date_pub');
            $table->integer('uniq_day')->nullable();
            $table->integer('user_id');
            $table->string('order_id');
            $table->boolean('online');
            $table->string('order_date');
            $table->string('date_create');
            $table->string('document_id');
            $table->string('provodka');
            $table->string('content');
            $table->string('orienter')->nullable();
            $table->string('client');
            $table->string('client_id');
            $table->string('group_price');
            $table->string('vip_oplata');
            $table->string('id_1c');
            $table->string('oplachena');
            $table->integer('step_one')->nullable();
            $table->integer('step_two')->nullable();
            $table->integer('step_six')->nullable();
            $table->integer('step')->nullable();;
            $table->integer('status')->nullable();;
            $table->enum('dallon',['0','1'])->nullable();
            $table->integer('car_model_id')->nullable();
            $table->string('branch_id');
            $table->datetime('change_date')->nullable();
            $table->enum('change_status',['0','1','2'])->nullable();
            $table->integer('config_time_id')->nullable();
            $table->datetime('end_time')->nullable();
            $table->integer('status_time')->nullable();
            $table->integer('different_status_time')->nullable();
            $table->string('add_hours')->nullable();
            $table->enum('delivery_type',['0','1','2'])->nullable();
            $table->integer('delivered_branch')->nullable();
            $table->enum('confirm_cancelled',['0'.'1'])->nullable();
            $table->integer('driver_manager')->nullable();
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
        Schema::dropIfExists('delivery_apps');
    }
};
