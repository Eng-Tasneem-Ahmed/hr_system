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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->time("time_in")->default(now());
            $table->time("time_out")->nullable();
            $table->integer("hours_worked")->nullable();
            $table->integer("late_minutes")->default(0);
            $table->string("ip");
            $table->decimal("latitude");
            $table->decimal("longitude");
            $table->foreignId("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
