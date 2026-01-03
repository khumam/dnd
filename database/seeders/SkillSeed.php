<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            [
                "name" => "Acrobatics",
                "description" => "Balance, flips, and agile movement.",
            ],
            [
                "name" => "Animal Handling",
                "description" => "Calm, train, or direct animals.",
            ],
            [
                "name" => "Arcana",
                "description" => "Knowledge of magic and the arcane.",
            ],
            [
                "name" => "Athletics",
                "description" => "Climb, jump, swim, and feats of strength.",
            ],
            [
                "name" => "Deception",
                "description" => "Lie, bluff, and mislead others.",
            ],
            [
                "name" => "History",
                "description" => "Recall lore, events, and ancient knowledge.",
            ],
            [
                "name" => "Insight",
                "description" => "Read intentions and detect lies.",
            ],
            [
                "name" => "Intimidation",
                "description" =>
                    "Threaten or pressure someone into compliance.",
            ],
            [
                "name" => "Investigation",
                "description" => "Search for clues and deduce information.",
            ],
            [
                "name" => "Medicine",
                "description" => "Stabilize and treat injuries or illness.",
            ],
            [
                "name" => "Nature",
                "description" => "Knowledge of wildlife, plants, and terrain.",
            ],
            [
                "name" => "Perception",
                "description" => "Spot details, hear sounds, notice danger.",
            ],
            [
                "name" => "Performance",
                "description" => "Entertain with acting, music, or dance.",
            ],
            [
                "name" => "Persuasion",
                "description" => "Influence others with charm and logic.",
            ],
            [
                "name" => "Religion",
                "description" => "Knowledge of gods, rites, and the undead.",
            ],
            [
                "name" => "Sleight of Hand",
                "description" => "Pick pockets and perform small tricks.",
            ],
            [
                "name" => "Stealth",
                "description" => "Hide and move quietly unseen.",
            ],
            [
                "name" => "Survival",
                "description" => "Track, forage, and endure the wilderness.",
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
