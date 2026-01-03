<?php

namespace App\Models;

use App\Observers\CharacterObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        "name",
        "race",
        "class",
        "background",
        "alignment",
        "gender",
        "age",
        "height",
        "weight",
        "eyes",
        "hair",
        "skin",
        "languages",
        "proficiencies",
        "equipment",
        "features",
        "traits",
        "ideals",
        "bonds",
        "flaws",
        "allies",
        "enemies",
        "notes",
    ];
    
    protected $casts = [
        "languages" => "array",
        "proficiencies" => "array",
        "equipment" => "array",
        "features" => "array",
        "traits" => "array",
        "ideals" => "array",
        "bonds" => "array",
        "flaws" => "array",
        "allies" => "array",
        "enemies" => "array",
    ];
    
    /**
     * Get the character's statistics.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function characterStatistics(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CharacterStatistic::class);
    }
    
    /**
     * Get the character's skills.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characterSkills(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CharacterSkill::class);
    }
    
    /**
     * Get the character's AI request log.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function aiRequestLog(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(AIRequestLog::class, 'requestable');
    }
}
