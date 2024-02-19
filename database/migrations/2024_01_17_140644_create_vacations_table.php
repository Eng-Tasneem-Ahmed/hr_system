<?php

use App\Enums\VacationStatus;
use App\Enums\VacationType;
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
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
            $table->text("note")->nullable();
            $table->date("from");
            $table->enum("type",VacationType::getValues());
            $table->enum("status",VacationStatus::getValues())->default(VacationStatus::PENDING->value);
            $table->date("to")->nullable();
            $table->foreignId("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacations');
    }
};
