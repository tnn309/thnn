<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('avatar')->default('image/profile1.jpg');
            $table->string('field')->nullable();
            $table->text('bio')->nullable();
            $table->text('skills')->nullable();
            $table->decimal('hourly_rate', 8, 2)->nullable();
            $table->float('rating')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('freelancers');
    }
};