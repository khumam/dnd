<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiRequestLog extends Model
{
    protected $fillable = [
        'user_id',
        'task_id',
        'record_id',
        'type',
        'request_data',
        'response_data',
        'requestable_id',
        'requestable_type',
        'status',
    ];
    
    protected $casts = [
        'request_data' => 'array',
        'response_data' => 'array',
    ];
    
    /**
     * Get the requestable that owns the AiRequestLog.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function requestable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
