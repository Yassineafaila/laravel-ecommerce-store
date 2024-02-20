<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{co
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orderItems', function (Blueprint $table) {

            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");
            $table->integer("quantity");
            $table->float("subTotal");

            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderItems');
    }
};
