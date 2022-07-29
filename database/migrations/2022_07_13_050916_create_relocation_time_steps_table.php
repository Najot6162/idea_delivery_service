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
        Schema::create('relocation_time_steps', function (Blueprint $table) {
            $table->id();
            $table->uuid('relocation_uuid');
            $table->integer('step');
            $table->integer('user_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('month_uniq')->nullable();
            $table->text('comment')->nullable();
            $table->enum('active',['0','1'])->default('0')->nullable();
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
        Schema::dropIfExists('relocation_time_steps');
    }
};
