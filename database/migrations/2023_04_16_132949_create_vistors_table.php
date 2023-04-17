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
        Schema::create('vistors', function (Blueprint $table) {
            $table->id();
            $table->string('vistor_code')->nullable();
            $table->string('vistor_phone');
            $table->string('vistor_balance');
            $table->string('vistor_count_slides');
            $table->string('vistor_count_activity');
            $table->decimal('lat', 10, 8);
            $table->decimal('long', 10, 8);
            $table->text('notes')->nullable();
            $table->foreignId('Agent_id')->constrained('agents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('manager_id')->constrained('managers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vistors');
    }
};
