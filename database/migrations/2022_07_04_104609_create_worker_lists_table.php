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
        Schema::create('worker_lists', function (Blueprint $table) {
            $table->id();
            $table->string('sales_id');
            $table->string('sales_name');
            $table->integer('branch_id');
            $table->enum('type',['1','2']);
            $table->integer('new');
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
        Schema::dropIfExists('worker_lists');
    }
};
