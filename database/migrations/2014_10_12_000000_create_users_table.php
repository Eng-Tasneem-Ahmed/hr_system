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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string("phone")->unique();
            $table->decimal("salary");
            $table->string('photo')->nullable();
            $table->string('front_id_card_photo');
            $table->string('back_id_card_photo');
            $table->string('password');
            $table->foreignId("branch_id")->nullable()->references("id")->on("branches")->onDelete('set null');
            $table->foreignId("department_id")->nullable()->references("id")->on("departments")->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
