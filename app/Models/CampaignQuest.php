<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignQuest extends Model
{
    protected $fillable = [
        'campaign_id',
        'name',
        'description',
        'status',
        'rewards',
    ];
    
    protected $casts = [
        'rewards' => 'array',
    ];
    
    /**
     * Get the campaign that owns the quest.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
