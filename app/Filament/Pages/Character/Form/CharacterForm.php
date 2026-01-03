<?php

namespace App\Filament\Pages\Character\Form;

use App\Models\CharacterClass;
use App\Models\Race;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class CharacterForm
{
    /**
     * Render Character form field
     * 
     * @return array
     */
    public static function make(): array
    {
        return [
            Section::make("Identity")
                ->description("Core identity details for your character.")
                ->schema([
                    TextInput::make("name")
                        ->label("Name")
                        ->placeholder("Elaria Moonshadow")
                        ->helperText(
                            "Your character’s full name or the name they are known by.",
                        )
                        ->required(),
                    Select::make("race")
                        ->label("Race")
                        ->placeholder("Elf")
                        ->helperText(
                            "Choose your character’s race (affects traits and flavor).",
                        )
                        ->required()
                        ->options(Race::query()->pluck("name", "name"))
                        ->searchable(),
                    Select::make("class")
                        ->label("Class")
                        ->placeholder("Rogue")
                        ->helperText(
                            "Pick your character’s class (defines their main abilities and role).",
                        )
                        ->required()
                        ->options(
                            CharacterClass::query()->pluck("name", "name"),
                        )
                        ->searchable(),
                    TextInput::make("background")
                        ->label("Background")
                        ->placeholder("Criminal")
                        ->helperText(
                            "A short background label (e.g., Acolyte, Soldier, Criminal) describing their past.",
                        )
                        ->required(),
                    TextInput::make("alignment")
                        ->label("Alignment")
                        ->placeholder("Chaotic Good")
                        ->helperText(
                            "Your character’s moral/ethical outlook (e.g., Lawful Good, Chaotic Neutral).",
                        )
                        ->required(),
                ])
                ->columns(2),

            Section::make("Appearance & Basics")
                ->description("Physical appearance and basic personal details.")
                ->schema([
                    TextInput::make("gender")
                        ->label("Gender")
                        ->placeholder("Female")
                        ->helperText(
                            "How your character identifies or presents (optional for roleplay detail).",
                        )
                        ->required(),
                    TextInput::make("age")
                        ->label("Age")
                        ->placeholder("24")
                        ->helperText(
                            "Your character’s age (use a number or an age range if you prefer).",
                        )
                        ->required(),
                    TextInput::make("height")
                        ->label("Height")
                        ->placeholder("5'10\" (178 cm)")
                        ->helperText(
                            "Physical height (e.g., 5'10\", 178 cm, or 'tall').",
                        )
                        ->required(),
                    TextInput::make("weight")
                        ->label("Weight")
                        ->placeholder("160 lb (72 kg)")
                        ->helperText(
                            "Approximate weight (e.g., 160 lb, 72 kg, or 'lean').",
                        )
                        ->required(),
                    TextInput::make("eyes")
                        ->label("Eyes")
                        ->placeholder("Emerald green")
                        ->helperText("Eye color or notable eye features.")
                        ->required(),
                    TextInput::make("hair")
                        ->label("Hair")
                        ->placeholder("Black, shoulder-length")
                        ->helperText(
                            "Hair color/style (or 'bald', 'shaved', etc.).",
                        )
                        ->required(),
                    TextInput::make("skin")
                        ->label("Skin")
                        ->placeholder("Pale with a crescent-moon tattoo")
                        ->helperText(
                            "Skin tone, complexion, or notable markings.",
                        )
                        ->required(),
                ])
                ->columns(2),

            Section::make("Capabilities")
                ->description(
                    "Languages and proficiencies your character can use.",
                )
                ->schema([
                    TagsInput::make("languages")
                        ->label("Languages")
                        ->placeholder("Common, Elvish, Thieves' Cant")
                        ->helperText(
                            "List languages your character can speak/read (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                    TagsInput::make("proficiencies")
                        ->label("Proficiencies")
                        ->placeholder(
                            "Stealth, Sleight of Hand, Thieves' Tools, Daggers",
                        )
                        ->helperText(
                            "Skills, tools, weapons, armor, or other proficiencies (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                ])
                ->columns(2),

            Section::make("Gear & Features")
                ->description("Equipment, features, and notable abilities.")
                ->schema([
                    TagsInput::make("equipment")
                        ->label("Equipment")
                        ->placeholder(
                            "Dagger, Lockpicks, Hooded cloak, Rope (50 ft)",
                        )
                        ->helperText(
                            "Starting gear and important items your character carries (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                    TagsInput::make("features")
                        ->label("Features")
                        ->placeholder("Darkvision, Sneak Attack, Fey Ancestry")
                        ->helperText(
                            "Notable abilities, class/race features, feats, or special traits (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                ])
                ->columns(2),

            Section::make("Personality")
                ->description(
                    "Personality definition: traits, ideals, bonds, and flaws.",
                )
                ->schema([
                    TagsInput::make("traits")
                        ->label("Traits")
                        ->placeholder(
                            "Always speaks in a calm whisper",
                        )
                        ->helperText(
                            "Describe mannerisms and personality quirks (2–3 short bullet points works well, click enter to add).",
                        )
                        ->required()
                        ->trim(),
                    TagsInput::make("ideals")
                        ->label("Ideals")
                        ->placeholder(
                            "Freedom: No one should live in chains.",
                        )
                        ->helperText(
                            "Beliefs and principles that guide your character’s choices (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                    TagsInput::make("bonds")
                        ->label("Bonds")
                        ->placeholder(
                            "I owe my mentor a life-debt.",
                        )
                        ->helperText(
                            "People, places, or goals your character is strongly tied to (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                    TagsInput::make("flaws")
                        ->label("Flaws")
                        ->placeholder(
                            "I can’t resist a risky gamble.",
                        )
                        ->helperText(
                            "Weaknesses, fears, or bad habits that can create interesting complications (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                ])
                ->columns(2),

            Section::make("Relationships")
                ->description("Important connections, allies, and adversaries.")
                ->schema([
                    TagsInput::make("allies")
                        ->label("Allies")
                        ->placeholder(
                            "Captain Maren (city watch contact)",
                        )
                        ->helperText(
                            "Friendly contacts, mentors, factions, or NPCs who might help your character (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                    TagsInput::make("enemies")
                        ->label("Enemies")
                        ->placeholder(
                            "Baron Veldran (corrupt noble)",
                        )
                        ->helperText(
                            "Rivals, villains, or organizations that oppose your character (click enter to add).",
                        )
                        ->required()
                        ->trim(),
                ])
                ->columns(2),

            Section::make("Notes")
                ->description("Additional notes and free-form details.")
                ->schema([
                    RichEditor::make("notes")
                        ->label("Notes")
                        ->placeholder(
                            "Lost heirloom: silver signet ring with a raven crest",
                        )
                        ->helperText(
                            "Anything else: backstory details, goals, quirks, or reminders for future sessions.",
                        )
                        ->required()
                        ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                ['undo', 'redo'],
                            ]),
                ]),
        ];
    }
}
