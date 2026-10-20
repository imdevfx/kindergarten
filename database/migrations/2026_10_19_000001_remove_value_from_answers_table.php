<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Variantlik test tizimiga o'tish uchun answers jadvalidan value kolonnasini olib tashlaymiz.
     * Endi to'g'ri/noto'g'ri javob test_variants.answer orqali aniqlanadi.
     */
    public function up(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->tinyInteger('value')->after('test_variant_id')->default(1);
        });
    }
};
