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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('cover')->nullable();
            $table->string('nama_projek');
            $table->text('informasi')->nullable();
            $table->enum('kategori', ['residensial', 'commercial_area', 'hotel_resort'])->default('residensial');
            // $table->text('fasilitas')->nullable();
            $table->text('lokasi')->nullable();
            $table->text('developer')->nullable();
            $table->boolean('pin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
