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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->boolean('is_admin')->nullable()->default('0');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('car_model')->nullable();
            $table->enum('active',['0','1'])->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('name');
            $table->string('login')->unique();
            $table->timestamp('login_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
