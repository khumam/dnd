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
        Schema::create('character_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->tinyInteger('max_health')->default(0);
            $table->tinyInteger('current_health')->default(0);
            $table->tinyInteger('temporary_health')->default(0);
            $table->tinyInteger('max_mana')->default(0);
            $table->tinyInteger('current_mana')->default(0);
            $table->tinyInteger('max_stamina')->default(0);
            $table->tinyInteger('current_stamina')->default(0);
            $table->tinyInteger('max_experience')->default(255);
            $table->tinyInteger('current_experience')->default(0);
            $table->tinyInteger('max_level')->default(0);
            $table->tinyInteger('current_level')->default(0);
            $table->tinyInteger('armor_class')->default(0);
            $table->tinyInteger('initiative')->default(0);
            $table->tinyInteger('speed')->default(0);
            $table->tinyInteger('strength')->default(0);
            $table->tinyInteger('dexterity')->default(0);
            $table->tinyInteger('constitution')->default(0);
            $table->tinyInteger('intelligence')->default(0);
            $table->tinyInteger('wisdom')->default(0);
            $table->tinyInteger('charisma')->default(0);
            $table->tinyInteger('strength_modifier')->default(0);
            $table->tinyInteger('dexterity_modifier')->default(0);
            $table->tinyInteger('constitution_modifier')->default(0);
            $table->tinyInteger('intelligence_modifier')->default(0);
            $table->tinyInteger('wisdom_modifier')->default(0);
            $table->tinyInteger('charisma_modifier')->default(0);
            $table->tinyInteger('inspiration')->default(0);
            $table->tinyInteger('proficiency_bonus')->default(0);
            $table->tinyInteger('passive_perception')->default(0);
            $table->tinyInteger('max_death_save_success')->default(3);
            $table->tinyInteger('max_death_save_failure')->default(0);
            $table->tinyInteger('current_death_save_success')->default(0);
            $table->tinyInteger('current_death_save_failure')->default(0);
            $table->tinyInteger('max_hit_dice')->default(0);
            $table->tinyInteger('saving_throw_strength')->default(0);
            $table->tinyInteger('saving_throw_dexterity')->default(0);
            $table->tinyInteger('saving_throw_constitution')->default(0);
            $table->tinyInteger('saving_throw_intelligence')->default(0);
            $table->tinyInteger('saving_throw_wisdom')->default(0);
            $table->tinyInteger('saving_throw_charisma')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_statistics');
    }
};
