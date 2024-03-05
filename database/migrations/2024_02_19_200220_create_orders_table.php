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
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->float("totalAmount");
            $table->string("tax")->nullable();
            $table->string("shipping_address")->nullable();
            $table->decimal('shipping_cost', 10, 2)->nullable();
            $table->string('shipping_method', 50)->nullable();
            $table->string('payment_method', 50)->nullable();
            $table->set("status", ["pending", "paid", "shipped", "delivered"]);
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
