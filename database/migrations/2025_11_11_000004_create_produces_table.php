<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produces', function (Blueprint $table) {
            $table->bigIncrements('produce_id');
            $table->unsignedBigInteger('farmer_id');
            $table->unsignedBigInteger('price_item_id')->nullable();
            $table->string('description');
            $table->integer('quantity')->default(0);
            $table->date('harvest_date')->nullable();
            $table->decimal('initial_price', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('farmer_id')->references('farmer_id')->on('farmers')->cascadeOnDelete();
            $table->foreign('price_item_id')->references('price_item_id')->on('price_items')->nullOnDelete();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('produces');
    }
};