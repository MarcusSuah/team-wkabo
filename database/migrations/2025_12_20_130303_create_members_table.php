<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('mid_name')->nullable();
            $table->string('last_name');
            $table->string('phone_primary');
            $table->string('phone_secondary')->nullable();
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->integer('current_age');
            $table->integer('age_2029');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->foreignId('clan_id')->constrained()->onDelete('cascade');
            $table->foreignId('town_id')->constrained()->onDelete('cascade');
            $table->string('current_residence');
            $table->string('voting_precinct_2029')->nullable();
            $table->string('occupation')->nullable();
            $table->string('whatsapp_primary')->nullable();
            $table->string('whatsapp_secondary')->nullable();
            $table->string('photo')->nullable();
            $table->text('prior_political_involvement')->nullable();
            $table->text('reasons_for_joining')->nullable();
            $table->enum('willing_to_volunteer', ['Yes', 'No', 'Maybe']);
            $table->enum('willing_to_lead', ['Yes', 'No', 'Maybe']);
            $table->text('preferred_contributions')->nullable();
            $table->boolean('declaration_accepted')->default(false);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
