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
            $table->id();
            $table->string('firstName', 25 );
            $table->string('lastName', 25);
            $table->string('sigla', 3)->unique();
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('admin')->default(0);
            $table->string('picture')->default('assets/img/avatars/5.png');
            $table->string('phone')->default('911222333')->validate('between:9,15');
            $table->boolean('ativo')->default(1);
            $table->boolean('force_password_reset')->default(1);
            $table->string('role')->default('Pentester');
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
