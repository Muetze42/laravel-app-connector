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
        Schema::create('connection_attempts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('client')->nullable();
            $table->string('platform')->nullable();
            $table->char('uri', 16);
            $table->text('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connection_attempts');
    }
};
