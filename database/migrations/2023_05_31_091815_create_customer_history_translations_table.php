<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_history_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_history_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('district');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_history_translations');
    }
};
