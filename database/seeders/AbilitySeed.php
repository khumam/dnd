<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbilitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            ['code' => 'STR', 'name' => 'Strength', 'description' => 'Physical power and endurance'],
            ['code' => 'DEX', 'name' => 'Dexterity', 'description' => 'Agility and coordination'],
            ['code' => 'CON', 'name' => 'Constitution', 'description' => 'Health and stamina'],
            ['code' => 'INT', 'name' => 'Intelligence', 'description' => 'Knowledge and reasoning'],
            ['code' => 'WIS', 'name' => 'Wisdom', 'description' => 'Perception and insight'],
            ['code' => 'CHA', 'name' => 'Charisma', 'description' => 'Persuasion and leadership']
        ];

        foreach ($abilities as $ability) {
            Ability::create($ability);
        }
    }
}
