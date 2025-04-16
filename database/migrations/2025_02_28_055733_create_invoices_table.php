<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('executorId');
            $table->string('executor');
            $table->unsignedBigInteger('customerId');
            $table->string('customer');
            $table->foreign('customerId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('period');
            $table->string('description');
            $table->boolean('issued');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
