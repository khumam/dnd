<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignNpc extends Model
{
    protected $fillable = [
        'campaign_id',
        'name',
        'description',
        'role',
        'statistics',
    ];
    
    protected $casts = [
        'statistics' => 'array',
    ];
    
    /**
     * Get the campaign associated with the NPC.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
