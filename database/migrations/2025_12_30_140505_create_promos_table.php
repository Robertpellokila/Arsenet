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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kode_promo')->unique();
            $table->text('deskripsi')->nullable();

            $table->enum('tipe_diskon', ['persen', 'nominal']);
            $table->integer('nilai_diskon');

            $table->integer('maks_diskon')->nullable(); // untuk persen
            $table->integer('min_transaksi')->nullable();

            $table->dateTime('mulai');
            $table->dateTime('berakhir');

            $table->integer('kuota')->nullable(); // berapa kali bisa dipakai
            $table->integer('digunakan')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
