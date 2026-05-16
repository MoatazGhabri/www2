<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prospect_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('prospect_source')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->date('first_call_date')->nullable();
            $table->string('demand_reference')->nullable();
            $table->string('client_interaction')->nullable();
            $table->string('other_properties_reference')->nullable();
            $table->string('other_interaction')->nullable();
            $table->date('other_call_dates')->nullable();
            $table->date('remind_at')->nullable();
            $table->string('followup_action')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prospect_contacts');
    }
}; 