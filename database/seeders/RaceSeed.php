<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $races = [
            [
                "name" => "Human",
                "description" =>
                    "Versatile and ambitious, humans adapt to any path.",
                "image_url" => null,
            ],
            [
                "name" => "Half Elf",
                "description" => "A blend of human drive and elven grace.",
                "image_url" => null,
            ],
            [
                "name" => "Half Orc",
                "description" =>
                    "Fierce and resilient, often forged by hardship.",
                "image_url" => null,
            ],
            [
                "name" => "High Elf",
                "description" =>
                    "Arcane-minded elves with refined culture and study.",
                "image_url" => null,
            ],
            [
                "name" => "Wood Elf",
                "description" => "Swift forest guardians attuned to the wild.",
                "image_url" => null,
            ],
            [
                "name" => "Drow",
                "description" =>
                    "Underdark elves shaped by shadow, intrigue, and survival.",
                "image_url" => null,
            ],
            [
                "name" => "Hill Dwarf",
                "description" =>
                    "Hardy dwarves known for endurance and keen senses.",
                "image_url" => null,
            ],
            [
                "name" => "Mountain Dwarf",
                "description" =>
                    "Stout, strong dwarves famed for toughness and craft.",
                "image_url" => null,
            ],
            [
                "name" => "Lightfoot Halfling",
                "description" =>
                    "Nimble and sociable, quick to blend into crowds.",
                "image_url" => null,
            ],
            [
                "name" => "Stout Halfling",
                "description" =>
                    "Tough halflings with surprising grit and resilience.",
                "image_url" => null,
            ],
            [
                "name" => "Forest Gnome",
                "description" =>
                    "Curious woodland tricksters with a talent for illusion.",
                "image_url" => null,
            ],
            [
                "name" => "Rock Gnome",
                "description" =>
                    "Inventive tinkerers with clever hands and bright minds.",
                "image_url" => null,
            ],
            [
                "name" => "Dragonborn",
                "description" =>
                    "Proud draconic folk driven by honor and breath weapon.",
                "image_url" => null,
            ],
            [
                "name" => "Tiefling",
                "description" =>
                    "Marked by infernal heritage, gifted with strange power.",
                "image_url" => null,
            ],
            [
                "name" => "Aasimar",
                "description" =>
                    "Touched by celestial light, guided by higher purpose.",
                "image_url" => null,
            ],
            [
                "name" => "Goliath",
                "description" =>
                    "Mountain-born giants of endurance and bold competition.",
                "image_url" => null,
            ],
            [
                "name" => "Tabaxi",
                "description" =>
                    "Feline wanderers driven by curiosity and wonder.",
                "image_url" => null,
            ],
            [
                "name" => "Firbolg",
                "description" =>
                    "Gentle forest folk with a secretive, druidic bent.",
                "image_url" => null,
            ],
            [
                "name" => "Kenku",
                "description" =>
                    "Clever mimics and scavengers seeking purpose and voice.",
                "image_url" => null,
            ],
            [
                "name" => "Triton",
                "description" =>
                    "Guardians of the deep, proud and disciplined.",
                "image_url" => null,
            ],
            [
                "name" => "Goblin",
                "description" =>
                    "Quick and scrappy, surviving by wit and nerve.",
                "image_url" => null,
            ],
            [
                "name" => "Orc",
                "description" =>
                    "Strong and relentless, living by might and momentum.",
                "image_url" => null,
            ],
            [
                "name" => "Lizardfolk",
                "description" =>
                    "Pragmatic reptilian hunters guided by instinct and need.",
                "image_url" => null,
            ],
            [
                "name" => "Yuan Ti",
                "description" =>
                    "Serpentine schemers with cold ambition and dark rites.",
                "image_url" => null,
            ],
            [
                "name" => "Air Genasi",
                "description" =>
                    "Elemental descendants with the freedom and force of wind.",
                "image_url" => null,
            ],
            [
                "name" => "Earth Genasi",
                "description" =>
                    "Steady and enduring, carrying the strength of stone.",
                "image_url" => null,
            ],
            [
                "name" => "Fire Genasi",
                "description" =>
                    "Bold and intense, fueled by a spark of elemental flame.",
                "image_url" => null,
            ],
            [
                "name" => "Water Genasi",
                "description" =>
                    "Calm or tempestuous, as changeable as the sea.",
                "image_url" => null,
            ],
        ];

        foreach ($races as $race) {
            Race::updateOrCreate(
                ["name" => $race["name"]],
                [
                    "description" => $race["description"],
                    "image_url" => $race["image_url"],
                ],
            );
        }
    }
}
