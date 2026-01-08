<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div wire:click="createCharacter" class="bg-[#59656F]/30 hover:bg-[#59656F]/10 p-4 flex flex-col items-center rounded-xl cursor-pointer justify-center">
            <div class="w-full h-full flex items-center justify-center flex-col">
                <div class="text-[#1D1E2C] h-12 w-12 mb-4">
                    <x-lucide-plus class="text-white" />
                </div>
                <span>Create New Character</span>
            </div>
        </div>
        @foreach($characters as $character)
            <div wire:click="detailCharacter({{ $character->id }})" class="bg-[#1D1E2C] p-4 flex flex-col items-center rounded-xl cursor-pointer gap-4">
                <div class="w-full bg-[#1D1E2C] rounded aspect-3/2 overflow-hidden flex items-center justify-center">
                    @if($character->image_url)
                    <img src="{{ \Storage::temporaryUrl($character->image_url, now()->addMinutes(5)) }}" class="w-full h-full object-cover rounded-lg" alt="{{ $character->name }}" />
                    @else
                    @if(!$character->aiRequestLog)
                    <button class="bg-[#9C528B] text-white px-4 py-2 rounded-lg" wire:click="generateAIImage({{ $character->id }})">Generate AI Image</button>
                    @else
                    <div class="flex w-full gap-2 items-center flex-col">
                        <span class="text-xs italic">Generating your character image</span>
                        <x-filament::loading-indicator class="h-5 w-5" />
                    </div>
                    @endif
                    @endif
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="text-white text-xl font-bold mb-2">{{ $character->name }}</div>
                    <div class="text-white text-sm">{{ $character->race }}, {{ $character->class }}</div>
                    <div class="text-white text-sm">{{ $character->background }}</div>
                </div>
                <div class="mt-4 flex gap-2 items-center">
                    <div class="text-white flex gap-2 items-center">
                        <x-lucide-heart class="h-4 w-4 text-white" />
                        <span>{{ $character->characterStatistics?->current_health ?? 0 }}</span>
                    </div>
                    <div class="text-white flex gap-2 items-center">
                        <x-lucide-flask-conical class="h-4 w-4 text-white" />
                        <span>{{ $character->characterStatistics?->current_mana ?? 0 }}</span>
                    </div>
                    <div class="text-white flex gap-2 items-center">
                        <x-lucide-swords class="h-4 w-4 text-white" />
                        <span>{{ $character->characterStatistics?->strength ?? 0 }}</span>
                    </div>
                    <div class="text-white flex gap-2 items-center">
                        <x-lucide-shield class="h-4 w-4 text-white" />
                        <span>{{ $character->characterStatistics?->armor_class ?? 0 }}</span>
                    </div>
                    <div class="text-white flex gap-2 items-center">
                        <span>EXP</span>
                        <span>{{ $character->characterStatistics?->current_experience ?? 0 }}</span>
                    </div>
                    <div class="text-white flex gap-2 items-center">
                        <span>LVL</span>
                        <span>{{ $character->characterStatistics?->current_level ?? 0 }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
