<?php

namespace App\Filament\Pages\Character\Form;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class CharacterStatisticForm
{
    /**
     * Render CharacterStatistic form field
     * 
     * @return array
     */
    public static function make(): array
    {
        return [
            Section::make("Vitals")
                ->description(
                    "Core survivability resources: health, mana, and stamina.",
                )
                ->schema([
                    TextInput::make("max_health")
                        ->label("Max Health")
                        ->helperText(
                            "Your character’s maximum hit points (HP).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->minValue(0)
                        ->default(100)
                        ->required(),

                    TextInput::make("current_health")
                        ->label("Current Health")
                        ->helperText("Current HP at the moment.")
                        ->numeric()
                        ->minValue(0)
                        ->default(100)
                        ->required(),

                    TextInput::make("temporary_health")
                        ->label("Temporary Health")
                        ->helperText(
                            "Temporary HP that absorbs damage first (usually from spells/abilities).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("max_mana")
                        ->label("Max Mana")
                        ->helperText(
                            "Maximum mana points (MP), if your system uses mana.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(100)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("current_mana")
                        ->label("Current Mana")
                        ->helperText("Current MP available right now.")
                        ->numeric()
                        ->maxValue(255)
                        ->default(100)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("max_stamina")
                        ->label("Max Stamina")
                        ->helperText(
                            "Maximum stamina points (SP), if your system uses stamina.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(100)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("current_stamina")
                        ->label("Current Stamina")
                        ->helperText("Current SP available right now.")
                        ->numeric()
                        ->maxValue(255)
                        ->default(100)
                        ->minValue(0)
                        ->required(),
                ])
                ->columns(3),

            Section::make("Progression")
                ->description(
                    "Character growth: level and experience tracking.",
                )
                ->schema([
                    TextInput::make("max_level")
                        ->label("Max Level")
                        ->helperText(
                            "The level cap for your campaign/system (if applicable).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(255)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("current_level")
                        ->label("Current Level")
                        ->helperText("Your character’s current level.")
                        ->numeric()
                        ->maxValue(255)
                        ->default(1)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("max_experience")
                        ->label("Max Experience")
                        ->helperText(
                            "The XP required to reach the next milestone/level (or XP cap, if you use one).",
                        )
                        ->maxValue(255)
                        ->default(100)
                        ->numeric()
                        ->minValue(0)
                        ->required(),

                    TextInput::make("current_experience")
                        ->label("Current Experience")
                        ->helperText(
                            "How much XP your character currently has.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->minValue(0)
                        ->required(),
                ])
                ->columns(2),

            Section::make("Combat & Movement")
                ->description(
                    "Key combat stats and how quickly your character can react and move.",
                )
                ->schema([
                    TextInput::make("armor_class")
                        ->label("Armor Class")
                        ->helperText("How hard your character is to hit (AC).")
                        ->numeric()
                        ->maxValue(255)
                        ->default(10)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("initiative")
                        ->label("Initiative")
                        ->helperText(
                            "Bonus added to initiative rolls (turn order).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->required(),

                    TextInput::make("speed")
                        ->label("Speed")
                        ->helperText(
                            "Movement speed (typically in feet per round).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(30)
                        ->minValue(0)
                        ->required(),
                ])
                ->columns(3),

            Section::make("Ability Scores")
                ->description(
                    "Your six core ability scores that define your character’s raw potential.",
                )
                ->schema([
                    TextInput::make("strength")
                        ->label("Strength")
                        ->helperText(
                            "Physical power: melee damage, lifting, athletics.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(10)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("dexterity")
                        ->label("Dexterity")
                        ->helperText(
                            "Agility: AC, reflexes, stealth, ranged attacks.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(10)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("constitution")
                        ->label("Constitution")
                        ->helperText(
                            "Endurance: HP, resilience, concentration checks.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(10)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("intelligence")
                        ->label("Intelligence")
                        ->helperText(
                            "Reasoning and memory: knowledge, investigation, spellcasting for some classes.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(10)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("wisdom")
                        ->label("Wisdom")
                        ->helperText(
                            "Perception and intuition: insight, awareness, spellcasting for some classes.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(10)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("charisma")
                        ->label("Charisma")
                        ->helperText(
                            "Presence: persuasion, performance, intimidation, spellcasting for some classes.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(10)
                        ->minValue(0)
                        ->required(),
                ])
                ->columns(3),

            Section::make("Ability Modifiers")
                ->description(
                    "Derived bonuses/penalties from your ability scores.",
                )
                ->schema([
                    TextInput::make("strength_modifier")
                        ->label("Strength Modifier")
                        ->helperText(
                            "Modifier used for STR-based rolls and checks.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->required(),

                    TextInput::make("dexterity_modifier")
                        ->label("Dexterity Modifier")
                        ->helperText(
                            "Modifier used for DEX-based rolls and checks.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->required(),

                    TextInput::make("constitution_modifier")
                        ->label("Constitution Modifier")
                        ->helperText(
                            "Modifier used for CON-based rolls and checks.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->required(),

                    TextInput::make("intelligence_modifier")
                        ->label("Intelligence Modifier")
                        ->helperText(
                            "Modifier used for INT-based rolls and checks.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->required(),

                    TextInput::make("wisdom_modifier")
                        ->label("Wisdom Modifier")
                        ->helperText(
                            "Modifier used for WIS-based rolls and checks.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->required(),

                    TextInput::make("charisma_modifier")
                        ->label("Charisma Modifier")
                        ->helperText(
                            "Modifier used for CHA-based rolls and checks.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->required(),
                ])
                ->columns(3),

            Section::make("Bonuses & Senses")
                ->description(
                    "Common bonuses and passive values used during play.",
                )
                ->schema([
                    TextInput::make("inspiration")
                        ->label("Inspiration")
                        ->helperText(
                            "Typically 0/1 (or points) used to gain advantage or reroll, depending on your rules.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->minValue(0)
                        ->required(),

                    TextInput::make("proficiency_bonus")
                        ->label("Proficiency Bonus")
                        ->helperText(
                            "Bonus added to proficient attacks, saves, and skills.",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->required(),

                    TextInput::make("passive_perception")
                        ->label("Passive Perception")
                        ->helperText(
                            "10 + Perception modifiers (used to notice things without rolling).",
                        )
                        ->maxValue(255)
                        ->default(0)
                        ->numeric()
                        ->minValue(0)
                        ->required(),
                ])
                ->columns(3),

            Section::make("Death Saves & Hit Dice")
                ->description(
                    "Track downed-state outcomes and recovery resources.",
                )
                ->schema([
                    TextInput::make("max_death_save_success")
                        ->label("Max Death Save Successes")
                        ->helperText(
                            "Usually 3 (how many successes stabilize you).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(3)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("current_death_save_success")
                        ->label("Current Death Save Successes")
                        ->helperText(
                            "How many death save successes you currently have.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("max_death_save_failure")
                        ->label("Max Death Save Failures")
                        ->helperText(
                            "Usually 3 (how many failures result in death).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(3)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("current_death_save_failure")
                        ->label("Current Death Save Failures")
                        ->helperText(
                            "How many death save failures you currently have.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->minValue(0)
                        ->required(),

                    TextInput::make("max_hit_dice")
                        ->label("Max Hit Dice")
                        ->helperText(
                            "Total hit dice available for short-rest healing (often equals level).",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->minValue(0)
                        ->required(),
                ])
                ->columns(3),

            Section::make("Saving Throws")
                ->description(
                    "Bonuses applied when making saving throws against effects and hazards.",
                )
                ->schema([
                    TextInput::make("saving_throw_strength")
                        ->label("STR Save Bonus")
                        ->helperText("Bonus applied to Strength saving throws.")
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->required(),

                    TextInput::make("saving_throw_dexterity")
                        ->label("DEX Save Bonus")
                        ->helperText(
                            "Bonus applied to Dexterity saving throws.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->required(),

                    TextInput::make("saving_throw_constitution")
                        ->label("CON Save Bonus")
                        ->helperText(
                            "Bonus applied to Constitution saving throws.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->required(),

                    TextInput::make("saving_throw_intelligence")
                        ->label("INT Save Bonus")
                        ->helperText(
                            "Bonus applied to Intelligence saving throws.",
                        )
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->required(),

                    TextInput::make("saving_throw_wisdom")
                        ->label("WIS Save Bonus")
                        ->helperText("Bonus applied to Wisdom saving throws.")
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->required(),

                    TextInput::make("saving_throw_charisma")
                        ->label("CHA Save Bonus")
                        ->helperText("Bonus applied to Charisma saving throws.")
                        ->numeric()
                        ->maxValue(255)
                        ->default(0)
                        ->required(),
                ])
                ->columns(3),
        ];
    }
}
