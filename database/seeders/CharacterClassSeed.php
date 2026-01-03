<?php

namespace Database\Seeders;

use App\Models\CharacterClass;
use Illuminate\Database\Seeder;

class CharacterClassSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                "name" => "Barbarian",
                "description" =>
                    "A fierce warrior who fights through rage and raw strength.",
                "image_url" => null,
            ],
            [
                "name" => "Bard",
                "description" =>
                    "A versatile performer who weaves magic through music and lore.",
                "image_url" => null,
            ],
            [
                "name" => "Cleric",
                "description" =>
                    "A divine champion who heals allies and smites foes with faith.",
                "image_url" => null,
            ],
            [
                "name" => "Druid",
                "description" =>
                    "A guardian of nature who commands primal magic and shapeshifts.",
                "image_url" => null,
            ],
            [
                "name" => "Fighter",
                "description" =>
                    "A master of arms and tactics, trained for any battlefield.",
                "image_url" => null,
            ],
            [
                "name" => "Monk",
                "description" =>
                    "A disciplined martial artist who channels ki into swift strikes.",
                "image_url" => null,
            ],
            [
                "name" => "Paladin",
                "description" =>
                    "A holy knight bound by oath, shielding allies and punishing evil.",
                "image_url" => null,
            ],
            [
                "name" => "Ranger",
                "description" =>
                    "A skilled tracker and hunter, thriving in the wilds with precision.",
                "image_url" => null,
            ],
            [
                "name" => "Rogue",
                "description" =>
                    "A cunning expert in stealth, tricks, and decisive precision.",
                "image_url" => null,
            ],
            [
                "name" => "Sorcerer",
                "description" =>
                    "An innate spellcaster whose power flows from a magical bloodline.",
                "image_url" => null,
            ],
            [
                "name" => "Warlock",
                "description" =>
                    "A spellcaster empowered by a pact with a mysterious patron.",
                "image_url" => null,
            ],
            [
                "name" => "Wizard",
                "description" =>
                    "A learned spellcaster who studies arcane theory and ancient tomes.",
                "image_url" => null,
            ],
            [
                "name" => "Artificer",
                "description" =>
                    "A magical inventor who blends craft, gadgets, and arcane science.",
                "image_url" => null,
            ],
        ];

        // Insert while avoiding duplicates by name (idempotent seeding)
        foreach ($classes as $class) {
            CharacterClass::updateOrCreate(
                ["name" => $class["name"]],
                [
                    "description" => $class["description"],
                    "image_url" => $class["image_url"],
                ],
            );
        }
    }
}
