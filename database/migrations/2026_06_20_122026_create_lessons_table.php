<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->enum('type', ['video', 'pdf', 'text', 'ppt', 'quiz']);
            $table->longText('content')->nullable();       
            $table->string('video_url')->nullable();       
            $table->string('file_path')->nullable();       
            $table->integer('duration_minutes')->nullable();
            $table->boolean('is_free_preview')->default(false);
            $table->integer('order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('lessons'); }
};
