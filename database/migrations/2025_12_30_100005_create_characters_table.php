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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('race');
            $table->string('class');
            $table->text('background');
            $table->string('alignment');
            $table->string('gender');
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->string('eyes');
            $table->string('hair');
            $table->string('skin');
            $table->json('languages');
            $table->json('proficiencies');
            $table->json('equipment');
            $table->json('features');
            $table->json('traits');
            $table->json('ideals');
            $table->json('bonds');
            $table->json('flaws');
            $table->json('allies');
            $table->json('enemies');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
