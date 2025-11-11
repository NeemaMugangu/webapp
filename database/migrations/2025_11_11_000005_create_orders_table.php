<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('farmer_id');
            $table->string('paypal_transaction_id')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamp('transaction_date')->useCurrent();
            $table->timestamps();

            $table->foreign('buyer_id')->references('buyer_id')->on('buyers')->cascadeOnDelete();
            $table->foreign('farmer_id')->references('farmer_id')->on('farmers')->cascadeOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('orders');
    }
};