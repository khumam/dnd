<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignRule extends Model
{
    protected $fillable = [
        'campaign_id',
        'key',
        'value',
        'description',
    ];

    /**
     * Get the campaign that owns the rule.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
