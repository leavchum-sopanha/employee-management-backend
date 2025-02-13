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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->enum('department', ['Business Development', 'Academic Affairs', 'Digital Marketing', 'IT'])->nullable();
            $table->string('position')->nullable();
            $table->date('date_of_joining');
            $table->decimal('salary', 10, 2);
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->decimal('performance_rating', 3, 2)->nullable();
            $table->enum('status', ['Active', 'Inactive', 'On Leave'])->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
