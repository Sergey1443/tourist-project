<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('login')->unique()->after('id');
            $table->string('middlename')->nullable()->after('name');
            $table->string('lastname')->nullable()->after('name');
            $table->string('phone')->after('email');
            $table->string('role')->default('user')->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['login', 'middlename', 'lastname', 'phone', 'role']);
        });
    }
};