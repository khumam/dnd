<?php

namespace App\Filament\Pages\Character\Pages;

use App\Actions\AI\GenerateCharacterImage;
use App\Models\Character;
use Filament\Pages\Page;
use Lang;

class ShowCharacter extends Page
{
    public string|int $id;
    public Character $character;

    protected static ?string $slug = "character/detail/{id}";
    protected string $view = 'filament.pages.character.pages.show-character';
    
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
    public function mount(): void
    {
        $this->character = Character::with(['characterStatistics', 'characterSkills'])->findOrFail($this->id);
    }
    
    /**
     * Get the abilities statistics.
     * 
     * @return array
     */
    public function abilitiesStatistics(): array
    {
        $characterAbilities = [];
        $abilities = [
            'STR' => 'strength',
            'DEX' => 'dexterity',
            'CON' => 'constitution',
            'INT' => 'intelligence',
            'WIS' => 'wisdom',
            'CHA' => 'charisma'
        ];
        
        foreach ($abilities as $key => $value) {
            $characterAbilities[$key] = [
                'score' => $this->character->characterStatistics->$value,
                'modifier' => $this->character->characterStatistics->{"{$value}_modifier"},
                'saving_throw' => $this->character->characterStatistics->{"saving_throw_{$value}"},
            ];
        }
        
        return $characterAbilities;
    }
    
    /**
     * Generate an AI image for the character.
     * 
     * @return void
     */
    public function generateAIImage(): void
    {
        GenerateCharacterImage::run($this->character->id);
    }
}
