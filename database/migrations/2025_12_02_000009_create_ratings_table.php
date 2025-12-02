<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('rater_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('ratee_id')->constrained('users')->onDelete('cascade');
            $table->integer('score')->min(1)->max(5);
            $table->text('review')->nullable();
            $table->timestamps();
            $table->index(['campaign_id', 'rater_id', 'ratee_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('ratings'); }
};
