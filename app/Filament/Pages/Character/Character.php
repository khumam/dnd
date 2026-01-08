<?php

namespace App\Filament\Pages\Character;

use App\Actions\AI\GenerateCharacterImage;
use App\Filament\Pages\Character\Pages\CreateCharacter;
use App\Filament\Pages\Character\Pages\EditCharacter;
use App\Filament\Pages\Character\Pages\ShowCharacter;
use App\Models\Character as ModelsCharacter;
use BackedEnum;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Collection;

class Character extends Page
{
    public array | Collection $characters = [];

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-users';
    protected string $view = 'filament.pages.character.character';
    
    /**
     * Get the active route pattern for the navigation item.
     * 
     * @return string|array
     */
    public static function getNavigationItemActiveRoutePattern(): string|array
    {
        return [
            static::getRouteName(),
            CreateCharacter::getRouteName(),
            EditCharacter::getRouteName(),
            ShowCharacter::getRouteName(),
        ];
    }
    
    /**
     * Mount the page.
     */
    public function mount(): void
    {
        $this->characters = ModelsCharacter::query()->with('characterStatistics')->latest()->get();
    }
    
    /**
     * Create a new character.
     * 
     * @return void
     */
    public function createCharacter(): void
    {
        $this->redirect(route(CreateCharacter::getRouteName()));
    }
    
    /**
     * Edit an existing character.
     * 
     * @param int $id The ID of the character to edit.
     * @return void
     */
    public function editCharacter(int $id): void
    {
        $this->redirect(route(EditCharacter::getRouteName(), ['id' => $id]));
    }
    
    /**
     * Show a character's details.
     * 
     * @param int $id The ID of the character to show.
     * @return void
     */
    public function detailCharacter(int $id): void
    {
        $this->redirect(route(ShowCharacter::getRouteName(), ['id' => $id]));
    }
    
    /**
     * Generate AI image for character
     * 
     * @param int $id
     * @return void
     */
    public function generateAIImage(int $id): void
    {
        GenerateCharacterImage::run($id);
    }
}
