<?php

namespace App\Filament\Pages\Character\Form;

use App\Models\Skill;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class CharacterSkillForm
{
    /**
     * Render CharacterSkill form field
     * 
     * @return array
     */
    public static function make(): array
    {
        return [
            Select::make("skills")
                ->multiple()
                ->required()
                ->options(Skill::query()->pluck("name", "id"))
                ->createOptionForm([
                    TextInput::make("name")->required(),
                    TextInput::make("description")->required(),
                ])
                ->createOptionUsing(fn (array $data): int => Skill::create($data)->getKey()),
        ];
    }
}
