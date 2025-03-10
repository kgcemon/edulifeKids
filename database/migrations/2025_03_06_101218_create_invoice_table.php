<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('StudentName');
            $table->string('StudentID');
            $table->string('invoice_number');
            $table->string('campus_name');
            $table->string('campus_address');
            $table->string('invoice_date');
            $table->string('invoice_name');
            $table->decimal('total_price');
            $table->decimal('discount')->default(0);
            $table->decimal('vat');
            $table->decimal('total');
            $table->decimal('paid');
            $table->decimal('due');
            $table->enum('status', ['pending', 'paid', 'due']);
            $table->enum('payment_method', ['Mobile Banking', 'Bank', 'Cash'])->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc');
    }
};
