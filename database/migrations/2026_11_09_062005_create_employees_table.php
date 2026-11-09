<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->text('address');
            $table->string('profile_photo')->nullable();
            $table->foreignId('department_id')
                ->constrained('departments')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
