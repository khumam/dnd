<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'cover',
        'description',
        'is_public',
        'status',
        'system',
        'start_level',
        'max_level',
        'metadata',
    ];
    
    protected $casts = [
        'metadata' => 'array',
    ];
    
    /**
     * Get all characters associated with the campaign.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characters(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Character::class);
    }
    
    /**
     * Get all locations associated with the campaign.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CampaignLocation::class);
    }
    
    /**
     * Get all NPCs associated with the campaign.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function npcs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CampaignNpc::class);
    }
    
    /**
     * Get all quests associated with the campaign.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CampaignQuest::class);
    }
    
    /**
     * Get all rules associated with the campaign.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rules(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CampaignRule::class);
    }
    
    /**
     * Get the campaign's AI request log.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function aiRequestLog(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(AIRequestLog::class, 'requestable');
    }
}
