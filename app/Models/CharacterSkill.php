<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterSkill extends Model
{
    protected $fillable = ['character_id', 'skill_id'];
    
    /**
     * Get the character that owns the skill.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Character::class);
    }
    
    /**
     * Get the skill that belongs to the character.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skill(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }
}
