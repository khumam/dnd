<?php

namespace App\Actions\Campaign;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class SaveCampaignData
{
    use AsAction;
    
    /**
     * Save a campaign
     * 
     * @param array $data The data to save
     * @return mixed
     */
    public function handle(array $data): mixed
    {
        return DB::transaction(fn () => Campaign::create($data));
    }
}
