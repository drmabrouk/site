<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('name');
            $table->enum('role', ['seeker', 'employer', 'admin'])->default('seeker')->after('email');
            $table->timestamp('username_last_changed_at')->nullable();
            $table->string('avatar')->nullable();
            $table->string('status')->default('active');
            $table->timestamp('last_login_at')->nullable();
            $table->json('location')->nullable(); // For global location support
            $table->json('preferences')->nullable(); // For multi-language/other preferences
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'role', 'username_last_changed_at', 'avatar', 'status', 'last_login_at', 'location', 'preferences']);
        });
    }
};
