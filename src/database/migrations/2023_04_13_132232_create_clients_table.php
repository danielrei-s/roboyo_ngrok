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
        Schema::create('clients', function (Blueprint $table) {
          $table->id();
          $table->string('logo')->default('assets/img/clients/sonae.jpg');
          $table->string('name', 45)->nullable(false);
          $table->string('tin')->unique()->nullable(false);
          $table->string('code')->unique()->nullable(false);
          $table->string('address')->nullable();
          $table->string('phone')->nullable()->validate('between:9,15');
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
