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
        Schema::create('relocation_apps', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('agent');
            $table->string('agent_id');
            $table->string('agent_recieve_id');
            $table->string('agent_recieve');
            $table->string('document_id');
            $table->enum('provodka', ['Да', 'нет ']);
            $table->string('date_order');
            $table->string('order_date');
            $table->string('date_recieve');
            $table->text('content')->nullable();
            $table->integer('branch_send_id');
            $table->integer('branch_receive_id');
            $table->string('namer_order');
            $table->string('id_1c');
            $table->integer('status');
            $table->integer('driver_id')->nullable();
            $table->integer('config_time_id')->nullable();
            $table->integer('status_time')->nullable();
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
        Schema::dropIfExists('relocation_apps');
    }
};
