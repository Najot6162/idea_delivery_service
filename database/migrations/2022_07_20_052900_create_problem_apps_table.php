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
        Schema::create('problem_apps', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('user_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('document_id');
            $table->string('agent_id');
            $table->string('agent');
            $table->enum('provodka',['Да','нет']);
            $table->string('data_order');
            $table->string('content');
            $table->string('document_foundations');
            $table->string('document_foundations_id');
            $table->string('nak_number');
            $table->string('nak_data');
            $table->string('defect');
            $table->string('branch_id');
            $table->string('namer_order');
            $table->string('guid');
            $table->string('complect');
            $table->string('guid_id');
            $table->string('sales');
            $table->string('sales_id');
            $table->string('id_1c');
            $table->string('log_id')->nullable();
            $table->string('status');
            $table->string('step');
            $table->enum('reception_type',['1','2','3'])->nullable();
            $table->enum('new_product',['0','1'])->nullable();
            $table->enum('is_problem',['0','1'])->nullable();
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
        Schema::dropIfExists('problem_apps');
    }
};
