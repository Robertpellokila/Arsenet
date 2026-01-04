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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('promo_id')
                ->nullable()
                ->after('id')
                ->constrained('promos')
                ->nullOnDelete();

            $table->integer('diskon')->default(0)->after('promo_id');
            $table->integer('subtotal')->after('diskon');
            $table->integer('total_harga')->change(); // jika belum ada / mau disesuaikan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['promo_id']);
            $table->dropColumn(['promo_id', 'diskon', 'subtotal']);
        });
    }
};
