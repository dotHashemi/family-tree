<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone', 11)->unique();
            $table->string('email', 191)->nullable();
            $table->string('password', 191);
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
