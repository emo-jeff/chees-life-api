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
        Schema::table('services', function (Blueprint $table) {
            $table->text('description_en')->nullable()->after('price');
            $table->text('description_tc')->nullable()->after('description_en');
            $table->text('detail_en')->nullable()->after('description_tc');
            $table->text('detail_tc')->nullable()->after('detail_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['description_en', 'description_tc', 'detail_en', 'detail_tc']);
        });
    }
};
