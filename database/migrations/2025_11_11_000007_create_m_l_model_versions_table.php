<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ml_model_versions', function (Blueprint $table) {
            $table->string('version_name')->primary();
            $table->date('trained_on')->nullable();
            $table->decimal('accuracy', 5, 2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('ml_model_versions');
    }
};