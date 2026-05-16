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
        Schema::create('promoteur_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promoteur_id'); // The promoteur who receives the message
            $table->unsignedBigInteger('property_id'); // The property the message is about
            $table->string('sender_name'); // Name of the person sending the message
            $table->string('sender_email'); // Email of the person sending the message
            $table->string('sender_phone'); // Phone of the person sending the message
            $table->text('message'); // The actual message content
            $table->enum('status', ['unread', 'read', 'replied'])->default('unread'); // Message status
            $table->timestamp('read_at')->nullable(); // When the message was read
            $table->timestamps();
            // Foreign key constraints removed for now
            // $table->foreign('promoteur_id')->references('id')->on('users');
            // $table->foreign('property_id')->references('id')->on('promoteur_properties');
            // Indexes for better performance
            $table->index(['promoteur_id', 'status']);
            $table->index(['property_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promoteur_messages');
    }
};
