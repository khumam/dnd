<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterStatistic extends Model
{
    protected $fillable = [
        "character_id",
        "max_health",
        "current_health",
        "temporary_health",
        "max_mana",
        "current_mana",
        "max_stamina",
        "current_stamina",
        "max_experience",
        "current_experience",
        "max_level",
        "current_level",
        "armor_class",
        "initiative",
        "speed",
        "strength",
        "dexterity",
        "constitution",
        "intelligence",
        "wisdom",
        "charisma",
        "strength_modifier",
        "dexterity_modifier",
        "constitution_modifier",
        "intelligence_modifier",
        "wisdom_modifier",
        "charisma_modifier",
        "inspiration",
        "proficiency_bonus",
        "passive_perception",
        "max_death_save_success",
        "max_death_save_failure",
        "current_death_save_success",
        "current_death_save_failure",
        "max_hit_dice",
        "saving_throw_strength",
        "saving_throw_dexterity",
        "saving_throw_constitution",
        "saving_throw_intelligence",
        "saving_throw_wisdom",
        "saving_throw_charisma",
    ];
    
    /**
     * Get the character that owns the character statistic.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Character::class);
    }
}
