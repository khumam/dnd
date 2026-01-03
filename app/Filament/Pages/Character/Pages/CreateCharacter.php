<?php

namespace App\Filament\Pages\Character\Pages;

use App\Actions\Character\SaveCharacter;
use App\Filament\Pages\Character\Form\CharacterForm;
use App\Filament\Pages\Character\Form\CharacterSkillForm;
use App\Filament\Pages\Character\Form\CharacterStatisticForm;
use App\Models\Character;
use Filament\Pages\Page;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

class CreateCharacter extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    protected static ?string $slug = "character/create";
    protected string $view = "filament.pages.character.pages.create-character";

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
        $data = $this?->form->getState();
        SaveCharacter::run($data);
    }

    /**
     * Render Character form field
     * 
     * @return Schema
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make("Character")
                        ->description(
                            "Describe your character's background, personality, and appearance.",
                        )
                        ->schema(CharacterForm::make()),
                    Step::make("Skills")
                        ->description(
                            "Select your character's skills and abilities.",
                        )
                        ->schema(CharacterSkillForm::make()),
                    Step::make("Statistics")
                        ->description(
                            "Set your character's statistics and attributes.",
                        )
                        ->schema(CharacterStatisticForm::make()),
                ])->submitAction(
                    view("components.character.create-character-button"),
                ),
            ])
            ->statePath("data");
    }
}
