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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
                $table->string('user_id')->nullable(); 
                $table->string('firstname')->nullable();
                $table->string('lastname')->nullable(); 
                $table->string('country')->nullable();
                $table->string('contact_number')->nullable(); 
                $table->string('email')->nullable(); 
                $table->decimal('total_amount', 10, 2)->nullable();
                $table->decimal('tax_amount', 10, 2)->nullable();
                $table->decimal('shipping_fee', 10, 2)->nullable();
                $table->string('payment_status')->nullable()->default('pending');
                $table->string('payment_method')->nullable();
                $table->text('shipping_address')->nullable();
                $table->date('delivery_date')->nullable();
                $table->string('currency')->nullable()->default('AED');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
