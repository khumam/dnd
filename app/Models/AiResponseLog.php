<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiResponseLog extends Model
{
    protected $fillable = [
        'task_id',
        'record_id',
        'response_data',
    ];
    
    protected $casts = [
        'response_data' => 'array',
    ];
}
