<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('couples', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('groom');
            $table->unsignedBigInteger('bride');
            $table->string('status', 30); // mariage, divorce
            $table->text('note')->nullable();
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();

            $table->foreign('groom')->references('id')->on('people')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('bride')->references('id')->on('people')->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('couples');
    }
};
