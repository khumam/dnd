<?php

namespace App\Filament\Pages\Campaign;

use App\Actions\AI\GenerateCampaignCoverImage;
use App\Models\Campaign as CampaignModel;
use App\Filament\Pages\Campaign\Pages\CreateCampaign;
use BackedEnum;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class Campaign extends Page
{
    public array | Collection $campaigns = [];

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-clipboard';
    protected string $view = 'filament.pages.campaign.campaign';
    
    /**
     * Get the active route pattern for the navigation item.
     * 
     * @return string|array
     */
    public static function getNavigationItemActiveRoutePattern(): string|array
    {
        return [
            static::getRouteName(),
            CreateCampaign::getRouteName(),
        ];
    }
    
    /**
     * Mount the page.
     */
    public function mount(): void
    {
        $this->campaigns = CampaignModel::query()->latest()->get();
    }
    
    /**
     * Go to create campaign page
     * 
     * @return RedirectResponse|Redirector
     */
    public function createCampaign(): RedirectResponse|Redirector
    {
        return redirect()->route(CreateCampaign::getRouteName());
    }
    
    /**
     * Show a campaign's details.
     * 
     * @param int $id The ID of the campaign to show.
     * @return void
     */
    public function detailCampaign(int $id): void
    {
        
    }
    
    /**
     * Generate AI image for campaign
     * 
     * @param int $id
     * @return void
     */
    public function generateAICover(int $id): void
    {
        GenerateCampaignCoverImage::run($id);
    }
}
