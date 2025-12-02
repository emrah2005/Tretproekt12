<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('influencer_id')->constrained('users')->onDelete('cascade');
            $table->decimal('proposed_rate', 12, 2);
            $table->enum('status', ['proposed', 'counter', 'accepted', 'rejected'])->default('proposed');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['campaign_id', 'influencer_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
