<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('influencer_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->enum('status', ['pending', 'escrow_held', 'released', 'failed'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->timestamp('escrow_released_at')->nullable();
            $table->timestamps();
            $table->index('campaign_id');
        });
    }
    public function down(): void { Schema::dropIfExists('payments'); }
};
