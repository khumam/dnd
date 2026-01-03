<?php

namespace App\Actions\Character;

use App\Models\Character;
use App\Models\CharacterSkill;
use App\Models\CharacterStatistic;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class SaveCharacter
{
    use AsAction;
    
    /**
     * Save a character.
     * 
     * @param array $data The data to save.
     * @return void
     */
    public function handle(array $data): void
    {
        DB::transaction(function () use ($data) {
            $character = Character::create($data);
            CharacterStatistic::create(["character_id" => $character?->id, ...$data]);
            foreach ($data['skills'] as $skill) {
                CharacterSkill::create([
                    'character_id' => $character?->id,
                    'skill_id' => $skill
                ]);
            }
        });
    }
}
