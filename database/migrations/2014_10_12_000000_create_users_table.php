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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->boolean('is_admin')->nullable()->default('0');
            $table->string('phone')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('car_model')->nullable();
            $table->integer('car_model_id')->nullable();
            $table->integer('active')->nullable();
            $table->integer('is_deleted')->nullable()->default('0');
            $table->integer('branch_id')->nullable();
            $table->string('name')->nullable();
            $table->timestamp('login_verified_at')->nullable();
            $table->string('password')->default('123456');
            $table->integer('role_id')->nullable();
            $table->string('fcm_token')->nullable()->unique();
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
