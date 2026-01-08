<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignLocation extends Model
{
    protected $fillable = [
        'campaign_id',
        'name',
        'description',
        'type',
        'parent_id',
    ];
    
    /**
     * Get the campaign associated with the location.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
    
    /**
     * Get all children locations associated with the location.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CampaignLocation::class, 'parent_id');
    }
    
    /**
     * Get the parent location associated with the location.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CampaignLocation::class, 'parent_id');
    }
}
