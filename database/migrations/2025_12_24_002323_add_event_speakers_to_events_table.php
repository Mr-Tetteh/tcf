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
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_speaker_5')->nullable();
            $table->string('event_speaker_6')->nullable();
            $table->string('event_speaker_7')->nullable();
            $table->string('self_registration_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
            'event_speaker_5',
            'event_speaker_6',
            'event_speaker_7',
            'self_registration_link',
        ]);
        });
    }
};
