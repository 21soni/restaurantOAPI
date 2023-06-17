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
            $table->integer('customer_id')->nullable();
            $table->text('order_date')->nullable();
            $table->text('order_timestamp')->nullable();
            $table->string('order_sub_total')->nullable();
            $table->string('tax_total')->nullable();
            $table->string('order_total')->nullable();
            $table->string('order_status')->default('Pending');
            $table->float('payment_amount', 10,2)->default(0);
            $table->string('payment_status')->default('Pending');
            $table->string('payment_date')->nullable();
            $table->string('payment_timestamp')->nullable();
            $table->string('delivery_status')->default('Pending');
            $table->string('delivery_date')->nullable();
            $table->string('delivery_timestamp')->nullable();
            $table->text('delivery_address')->nullable();
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
