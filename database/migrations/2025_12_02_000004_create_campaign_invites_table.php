<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('campaign_invites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('influencer_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'expired'])->default('pending');
            $table->text('message')->nullable();
            $table->timestamps();
            $table->index(['campaign_id', 'influencer_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_invites');
    }
};
