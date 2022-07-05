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
        Schema::create('worker_menus', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->string('title');
            $table->integer('order_list');
            $table->integer('parent_id');
            $table->string('icon');
            $table->enum('is_delete',['0','1']);
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
        Schema::dropIfExists('worker_menus');
    }
};
