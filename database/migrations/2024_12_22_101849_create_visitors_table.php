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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',50)->nullable();
            $table->string('mobile',50);
            $table->integer('class');
            $table->string('address',100);
            $table->string('KidsName',100);
            $table->string('KidsAge',100);
            $table->enum('interested',['yes','no', 'n/a'])->default('n/a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
