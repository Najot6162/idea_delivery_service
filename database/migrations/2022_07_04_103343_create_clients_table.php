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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();;
            $table->string('address_real')->nullable();;
            $table->string('address_passport')->nullable();;
            $table->string('client_id');
            $table->string('code')->nullable();;
            $table->text('phone')->nullable();;
            $table->string('passport')->nullable();;
            $table->integer('status')->nullable();;
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
        Schema::dropIfExists('clients');
    }
};
