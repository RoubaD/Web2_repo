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
        // Create the users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // Full name field
            $table->string('first_name');  // First name
            $table->string('last_name');  // Last name
            $table->enum('gender', ['male', 'female'])->nullable();  // Gender field
            $table->string('email')->unique();  // Email field with unique constraint
            $table->timestamp('email_verified_at')->nullable();  // Email verification timestamp
            $table->string('password');  // Password field
            $table->rememberToken();  // Token for "remember me" functionality
            $table->timestamps();  // Created_at and updated_at timestamps
        });

        // Create the password reset tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();  // Primary key (email) for quick lookup
            $table->string('token');  // Reset token
            $table->timestamp('created_at')->nullable();  // Timestamp of creation
        });

        // Create the sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();  // Primary key for session ID
            $table->foreignId('user_id')->nullable()->index();  // Foreign key to users table
            $table->string('ip_address', 45)->nullable();  // IP address of the user
            $table->text('user_agent')->nullable();  // Browser information
            $table->longText('payload');  // Session data payload
            $table->integer('last_activity')->index();  // Last activity timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order to avoid foreign key constraints issues
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
