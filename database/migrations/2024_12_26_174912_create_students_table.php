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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('StudentID',15)->unique();
            $table->string('StudentName',50);
            $table->string('Campus',50);
            $table->string('Batch',50);
            $table->string('Shift',50);
            $table->date('AdmissionDate',);
            $table->string("Fnumber",14);
            $table->string("Mnumber",14);
            $table->string("Session",30);
            $table->string("FeeType",30);
            $table->string("Discount",30);
            $table->boolean("Status",);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
