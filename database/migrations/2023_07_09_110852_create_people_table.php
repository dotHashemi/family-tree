<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city');
            $table->unsignedBigInteger('father')->nullable();
            $table->unsignedBigInteger('mother')->nullable();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('nickname', 50)->nullable();
            $table->string('gender', 10); // male, female, other
            $table->string('national', 50)->nullable();
            $table->dateTime('birth')->nullable();
            $table->dateTime('death')->nullable();
            $table->text('note')->nullable();
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();

            $table->foreign('city')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('father')->references('id')->on('people')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('mother')->references('id')->on('people')->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
