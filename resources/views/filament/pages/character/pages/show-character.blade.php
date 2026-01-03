<x-filament-panels::page>
    <div class="grid grid-cols-3 gap-4">
        <x-filament::section class="bg-[#1D1E2C]">
            <div class="flex flex-col items-center gap-4 w-full">
                <div class="w-full bg-[#1D1E2C] rounded aspect-3/2 overflow-hidden flex justify-center items-center">
                    @if($character->image_url)
                    <img src="{{ \Storage::temporaryUrl($character->image_url, now()->addMinutes(5)) }}" class="w-full h-full object-cover rounded-lg" alt="">
                    @else
                    @if(!$character->aiRequestLog)
                    <button class="bg-[#9C528B] text-white px-4 py-2 rounded-lg" wire:click="generateAIImage">Generate AI Image</button>
                    @else
                    <div class="flex w-full gap-2 items-center flex-col">
                        <span class="text-xs italic">Generating your character image</span>
                        <x-filament::loading-indicator class="h-5 w-5" />
                    </div>
                    @endif
                    @endif
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Level</div>
                    <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->current_level ?? 'N/A' }}</div>
                </div>
                <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ $character->characterStatistics->current_experience }}" aria-valuemin="0" aria-valuemax="{{ $character?->characterStatistics->max_experience ?? 'N/A' }}">
                    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-[#9C528B] text-xs text-white text-center whitespace-nowrap transition duration-500" style="width: {{ $character->characterStatistics->current_experience / ($character->characterStatistics->max_experience ?? 1) * 100 }}%"></div>
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Experience</div>
                    <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->current_experience ?? 'N/A' }}</div>
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Next Experience</div>
                    <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->max_experience ?? 'N/A' }}</div>
                </div>
                <hr class="text-[#D7CDCC]/20 w-full">
                <div class="flex flex-col w-full gap-2">
                    <div class="w-full flex justify-between items-center">
                        <div class="text-white text-sm">Health Points</div>
                        <div class="text-gray-400 text-sm flex items-center gap-2">
                            <span>{{ $character?->characterStatistics->current_health ?? 'N/A' }}</span>
                            <x-lucide-heart class="w-4 h-4 text-gray-400" />
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <div class="text-white text-sm">0</div>
                        <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->max_health ?? 'N/A' }}</div>
                    </div>
                    <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ $character?->characterStatistics->current_health }}" aria-valuemin="0" aria-valuemax="{{ $character?->characterStatistics->max_health }}">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-red-500 text-xs text-white text-center whitespace-nowrap transition duration-500" style="width: {{ $character?->characterStatistics->current_health / ($character?->characterStatistics->max_health ?? 1) * 100 }}%"></div>
                    </div>
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Temporary Health Points</div>
                    <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->temporary_health ?? 'N/A' }}</div>
                </div>
                <hr class="text-[#D7CDCC]/20 w-full">
                <div class="flex flex-col w-full gap-2">
                    <div class="w-full flex justify-between items-center">
                        <div class="text-white text-sm">Mana</div>
                        <div class="text-gray-400 text-sm flex items-center gap-2">
                            <span>{{ $character?->characterStatistics->current_mana ?? 'N/A' }}</span>
                            <x-lucide-flask-conical class="w-4 h-4 text-gray-400" />
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <div class="text-white text-sm">0</div>
                        <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->max_mana ?? 'N/A' }}</div>
                    </div>
                    <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ $character?->characterStatistics->current_mana ?? 0 }}" aria-valuemin="0" aria-valuemax="{{ $character?->characterStatistics->max_mana ?? 0 }}">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-500 text-xs text-white text-center whitespace-nowrap transition duration-500" style="width: {{ $character?->characterStatistics->current_mana / ($character?->characterStatistics->max_mana ?? 1) * 100 }}%"></div>
                    </div>
                </div>
                <hr class="text-[#D7CDCC]/20 w-full">
                <div class="flex flex-col w-full gap-2">
                    <div class="w-full flex justify-between items-center">
                        <div class="text-white text-sm">Stamina</div>
                        <div class="text-gray-400 text-sm flex items-center gap-2">
                            <span>{{ $character?->characterStatistics->current_stamina ?? 'N/A' }}</span>
                            <x-lucide-zap class="w-4 h-4 text-gray-400" />
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <div class="text-white text-sm">0</div>
                        <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->max_stamina ?? 'N/A' }}</div>
                    </div>
                    <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ $character?->characterStatistics->current_stamina }}" aria-valuemin="0" aria-valuemax="{{ $character?->characterStatistics->max_stamina }}">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-amber-500 text-xs text-white text-center whitespace-nowrap transition duration-500" style="width: {{ $character?->characterStatistics->current_stamina / ($character?->characterStatistics->max_stamina ?? 1) * 100 }}%"></div>
                    </div>
                </div>
                <hr class="text-[#D7CDCC]/20 w-full">
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Armor Class</div>
                    <div class="text-gray-400 text-sm flex items-center gap-2">
                        <span>{{ $character?->characterStatistics->armor_class ?? 'N/A' }}</span>
                        <x-lucide-shield class="w-4 h-4 text-gray-400" />
                    </div>
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Initiative</div>
                    <div class="text-gray-400 text-sm flex items-center gap-2">
                        <span>{{ $character?->characterStatistics->initiative ?? 'N/A' }}</span>
                        <x-lucide-brain class="w-4 h-4 text-gray-400" />
                    </div>
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Speed</div>
                    <div class="text-gray-400 text-sm flex items-center gap-2">
                        <span>{{ $character?->characterStatistics->speed ?? 'N/A' }}</span>
                        <x-lucide-footprints class="w-4 h-4 text-gray-400" />
                    </div>
                </div>
                <hr class="text-[#D7CDCC]/20 w-full">
                <div class="text-white text-sm w-full">
                    <table class="border-spacing-2 border-separate w-full">
                        <thead>
                            <th></th>
                            <th class="text-right">Score</th>
                            <th class="text-right">Mod</th>
                            <th class="text-right">Save</th>
                        </thead>
                        <tbody>
                            @foreach($this->abilitiesStatistics() as $ability => $statistic)
                            <tr>
                                <td>{{ $ability }}</td>
                                <td class="text-right">{{ $statistic['score'] }}</td>
                                <td class="text-right">{{ $statistic['modifier'] }}</td>
                                <td class="text-right">{{ $statistic['saving_throw'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr class="text-[#D7CDCC]/20 w-full">
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Inspiration</div>
                    <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->inspiration ?? 'N/A' }}</div>
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Proficiency Bonus</div>
                    <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->proficiency_bonus ?? 'N/A' }}</div>
                </div>
                <div class="w-full flex justify-between items-center">
                    <div class="text-white text-sm">Passive Perception</div>
                    <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->passive_perception ?? 'N/A' }}</div>
                </div>
                <hr class="text-[#D7CDCC]/20 w-full">
                <div class="flex flex-col w-full gap-2">
                    <div class="text-white text-sm">Death Save Success</div>
                    <div class="flex justify-between items-center w-full">
                        <div class="text-white text-sm">0</div>
                        <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->max_death_save_success ?? 'N/A' }}</div>
                    </div>
                    <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ $character?->characterStatistics->death_save_success }}" aria-valuemin="0" aria-valuemax="{{ $character?->characterStatistics->max_death_save_success }}">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-emerald-500 text-xs text-white text-center whitespace-nowrap transition duration-500" style="width: {{ $character?->characterStatistics->death_save_success / ($character?->characterStatistics->max_death_save_success ?? 1) * 100 }}%"></div>
                    </div>
                </div>
                <div class="flex flex-col w-full gap-2">
                    <div class="text-white text-sm">Death Save Failure</div>
                    <div class="flex justify-between items-center w-full">
                        <div class="text-white text-sm">0</div>
                        <div class="text-gray-400 text-sm">{{ $character?->characterStatistics->max_death_save_failure ?? 'N/A' }}</div>
                    </div>
                    <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ $character?->characterStatistics->death_save_failure }}" aria-valuemin="0" aria-valuemax="{{ $character?->characterStatistics->max_death_save_failure }}">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-gray-500 text-xs text-white text-center whitespace-nowrap transition duration-500" style="width: {{ $character?->characterStatistics->death_save_failure / ($character?->characterStatistics->max_death_save_failure ?? 1) * 100 }}%"></div>
                    </div>
                </div>
            </div>
        </x-filament::section>
        <div class="col-span-2 flex flex-col gap-4">
            <x-filament::section collapsible>
                <x-slot name="heading">
                    {{ $character->name }}
                </x-slot>
            
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Race & Class</p>
                        <p class="text-sm">{{ $character->race }}, {{ $character->class }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Alignment</p>
                        <p class="text-sm">{{ $character->alignment }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Background</p>
                        <p class="text-sm">{{ $character->background }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Languages</p>
                        <p class="text-sm">{{ implode(', ', $character->languages) }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Proficiencies</p>
                        <p class="text-sm">{{ implode(', ', $character->proficiencies) }}</p>
                    </div>
                </div>
            </x-filament::section>
            <x-filament::section collapsible>
                <x-slot name="heading">
                    Appearance & Basics
                </x-slot>
            
                <div class="w-full grid grid-cols-2 gap-4">
                    <div class="w-full flex justify-between items-center">
                        <div class="text-sm">Gender</div>
                        <div class="text-sm font-bold">{{ $character?->gender ?? 'N/A' }}</div>
                    </div>
                    <div class="w-full flex justify-between items-center">
                        <div class="text-sm">Age</div>
                        <div class="text-sm font-bold">{{ $character?->age ?? 'N/A' }}</div>
                    </div>
                    <div class="w-full flex justify-between items-center">
                        <div class="text-sm">Height</div>
                        <div class="text-sm font-bold">{{ $character?->height ?? 'N/A' }}</div>
                    </div>
                    <div class="w-full flex justify-between items-center">
                        <div class="text-sm">Weight</div>
                        <div class="text-sm font-bold">{{ $character?->weight ?? 'N/A' }}</div>
                    </div>
                    <div class="w-full flex justify-between items-center">
                        <div class="text-sm">Eyes</div>
                        <div class="text-sm font-bold">{{ $character?->eyes ?? 'N/A' }}</div>
                    </div>
                    <div class="w-full flex justify-between items-center">
                        <div class="text-sm">Skin</div>
                        <div class="text-sm font-bold">{{ $character?->skin ?? 'N/A' }}</div>
                    </div>
                    <div class="w-full flex justify-between items-center">
                        <div class="text-sm">Hair</div>
                        <div class="text-sm font-bold">{{ $character?->hair ?? 'N/A' }}</div>
                    </div>
                </div>
            </x-filament::section>
            <x-filament::section collapsible>
                <x-slot name="heading">
                    Gears & Features
                </x-slot>
                <div class="flex flex-col gap-4">
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Equipment</p>
                        <p class="text-sm">{{ implode(', ', $character->equipment) }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Features</p>
                        <p class="text-sm">{{ implode(', ', $character->features) }}</p>
                    </div>
                </div>
            </x-filament::section>
            <x-filament::section collapsible>
                <x-slot name="heading">
                    Skills
                </x-slot>
                <div class="flex flex-col gap-4">
                    @foreach($character->characterSkills as $skill)
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">{{ $skill->skill->name }}</p>
                        <p class="text-sm">{{ $skill->skill->description }}</p>
                    </div>
                    @endforeach
                </div>
            </x-filament::section>
            <x-filament::section collapsible>
                <x-slot name="heading">
                    Personality
                </x-slot>
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Traits</p>
                        <p class="text-sm">{{ implode(', ', $character->traits) }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Ideals</p>
                        <p class="text-sm">{{ implode(', ', $character->ideals) }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Bonds</p>
                        <p class="text-sm">{{ implode(', ', $character->bonds) }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Flaws</p>
                        <p class="text-sm">{{ implode(', ', $character->flaws) }}</p>
                    </div>
                </div>
            </x-filament::section>
            <x-filament::section collapsible>
                <x-slot name="heading">
                    Relationships
                </x-slot>
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Allies</p>
                        <p class="text-sm">{{ implode(', ', $character->allies) }}</p>
                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm font-bold">Enemies</p>
                        <p class="text-sm">{{ implode(', ', $character->enemies) }}</p>
                    </div>
                </div>
            </x-filament::section>
            <x-filament::section collapsible>
                <x-slot name="heading">
                    Notes
                </x-slot>
                <p class="text-sm">{!! str($character->notes)->sanitizeHtml() !!}</p>
            </x-filament::section>
        </div>
    </div>
</x-filament-panels::page>
