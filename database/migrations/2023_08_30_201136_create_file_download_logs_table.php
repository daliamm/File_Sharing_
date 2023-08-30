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
        Schema::create('file_download_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->foreignId('file_id')
            ->nullable()
            ->constrained()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_download_logs');
    }
};
