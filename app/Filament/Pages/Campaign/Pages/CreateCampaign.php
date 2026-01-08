<?php

namespace App\Filament\Pages\Campaign\Pages;

use App\Actions\Campaign\SaveCampaignData;
use App\Filament\Pages\Campaign\Campaign;
use App\Filament\Pages\Campaign\Form\CampaignForm;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

class CreateCampaign extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    protected static ?string $slug = "campaign/create";
    protected string $view = 'filament.pages.campaign.pages.create-campaign';
    
    /**
     * Hide the page from navigation.
     * 
     * @return bool
     */
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    
    /**
     * Mount the page.
     */
    public function mount()
    {
        $this?->form->fill();
    }
    
    /**
     * Create a new character.
     * 
     * @return void
     */
    public function create(): void
    {
        try {
            $data = $this?->form->getState();
            SaveCampaignData::run($data);
            
            Notification::make()
                ->title('Campaign Created')
                ->success()
                ->send();
            
            $this->redirect(route(Campaign::getRouteName()));
        } catch (\Exception $e) {
            Notification::make()
                ->title('Campaign Creation Failed')
                ->danger()
                ->send();
            return;
        }
    }
    
    /**
     * Render Character form field
     * 
     * @return Schema
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components(CampaignForm::make())
            ->statePath("data");
    }
}
