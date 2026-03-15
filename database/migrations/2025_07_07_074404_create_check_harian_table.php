<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('check_harian', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->date('tanggal');
        $table->decimal('suhu', 5, 2);  // Suhu (Temperature)
        $table->decimal('berat', 5, 2); // Berat (Weight)
        $table->string('nafsu_makan'); // Nafsu makan
        $table->enum('minum_obat', ['Ya', 'Tidak']); // Minum obat
        $table->string('catatan_pete'); // Catatan Pete
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_harian');
    }
};

