<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * responses jadvaliga test_category_id qo'shamiz —
     * foydalanuvchi qaysi kategoriya testini topshirganini saqlaymiz.
     */
    public function up(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\TestCategory::class)
                ->nullable()
                ->after('user_id')
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\TestCategory::class);
            $table->dropColumn('test_category_id');
        });
    }
};
