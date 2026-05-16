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
        Schema::table('admin_messages', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id')->nullable()->after('id');
            $table->enum('status', ['unread', 'read', 'replied'])->default('unread')->after('message');
            $table->timestamp('read_at')->nullable()->after('status');
            $table->index(['property_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_messages', function (Blueprint $table) {
            $table->dropIndex(['property_id', 'status']);
            $table->dropColumn(['property_id', 'status', 'read_at']);
        });
    }
}; 