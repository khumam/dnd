<?php

namespace App\Filament\Pages\Campaign\Form;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class CampaignForm
{
    /**
     * Render Campaign form fields.
     *
     * @return array
     */
    public static function make(): array
    {
        return [
            Section::make("General")
                ->description(
                    "Define the campaign identity and what players will see first.",
                )
                ->schema([
                    TextInput::make("name")
                        ->required()
                        ->maxLength(255)
                        ->live()
                        ->helperText(
                            "The campaign title shown throughout the app (max 255 characters).",
                        )
                        ->afterStateUpdated(fn (Set $set, $state) => $set("slug", Str::slug($state))),

                    TextInput::make("slug")
                        ->required()
                        ->maxLength(255)
                        ->rule("regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/")
                        ->validationMessages([
                            "regex" =>
                                'The slug must be lowercase and use hyphens only (e.g. "my-campaign-1").',
                        ])
                        ->helperText(
                            'URL-friendly identifier. Use lowercase letters, numbers, and hyphens only. Example: "my-campaign-1". Must be unique.',
                        ),

                    TextInput::make("cover")
                        ->maxLength(255)
                        ->helperText(
                            "Optional cover image path/URL used in listings and headers. Leave empty to use the default.",
                        ),

                    RichEditor::make("description")->helperText(
                        "Optional overview to set expectations (premise, tone, content warnings, etc.).",
                    ),
                ]),

            Section::make("Rules & Levels")
                ->description(
                    "Set the game system and the character level range for this campaign.",
                )
                ->schema([
                    Select::make("system")
                        ->required()
                        ->options([
                            "dnd5e" => "D&D 5e",
                            "dnd2024" => "D&D 2024",
                        ])
                        ->helperText(
                            "Select the ruleset the campaign uses. This can be used later to tailor sheets, rules, and content.",
                        ),

                    TextInput::make("start_level")
                        ->required()
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(20)
                        ->helperText(
                            "The starting character level (typically 1–20).",
                        ),

                    TextInput::make("max_level")
                        ->required()
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(20)
                        ->helperText(
                            "The maximum character level reachable in this campaign (typically 1–20).",
                        ),
                ]),

            Section::make("Visibility & Status")
                ->description(
                    "Control who can discover the campaign and its current lifecycle state.",
                )
                ->schema([
                    Toggle::make("is_public")->helperText(
                        "When enabled, the campaign can be listed/discoverable. Keep disabled for private or invite-only campaigns.",
                    ),

                    Select::make("status")
                        ->required()
                        ->options([
                            "draft" => "Draft",
                            "active" => "Active",
                            "completed" => "Completed",
                            "archived" => "Archived",
                        ])
                        ->helperText(
                            "Draft: not ready. Active: currently running. Completed: finished story. Archived: read-only / no longer maintained.",
                        ),
                ]),

            Section::make("Metadata")
                ->description(
                    "Optional structured data for advanced usage (integrations, tags, extra settings).",
                )
                ->schema([
                    KeyValue::make("metadata")->helperText(
                        "Optional JSON object. Use this for extra settings that don’t warrant dedicated columns yet.",
                    ),
                ]),
        ];
    }
}
