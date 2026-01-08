<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div wire:click="createCampaign" class="bg-[#59656F]/30 hover:bg-[#59656F]/20 p-4 flex flex-col items-center rounded-xl cursor-pointer justify-center">
            <div class="w-full h-full flex items-center justify-center flex-col">
                <div class="text-[#1D1E2C] h-12 w-12 mb-4">
                    <x-lucide-plus class="text-white" />
                </div>
                <span>Create New Campaign</span>
            </div>
        </div>
        @foreach($campaigns as $campaign)
            <div wire:click="detailCampaign({{ $campaign->id }})" class="bg-[#1D1E2C] p-4 flex flex-col items-center rounded-xl cursor-pointer gap-4">
                <div class="w-full bg-[#1D1E2C] rounded aspect-3/2 overflow-hidden flex items-center justify-center">
                    @if($campaign->cover)
                    <img src="{{ \Storage::temporaryUrl($campaign->cover, now()->addMinutes(5)) }}" class="w-full h-full object-cover rounded-lg" alt="{{ $campaign->name }}" />
                    @else
                    @if(!$campaign->aiRequestLog)
                    <button class="bg-[#9C528B] text-white px-4 py-2 rounded-lg" wire:click="generateAICover({{ $campaign->id }})">Generate AI Cover</button>
                    @else
                    <div class="flex w-full gap-2 items-center flex-col">
                        <span class="text-xs italic">Generating your cover image</span>
                        <x-filament::loading-indicator class="h-5 w-5" />
                    </div>
                    @endif
                    @endif
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="text-white text-xl font-bold mb-2 line-clamp-1">{{ $campaign->name }}</div>
                    <div class="text-gray-400 text-sm line-clamp-4">{!! str($campaign->description)->sanitizeHtml() !!}</div>
                </div>
                <div class="w-full flex flex-col items-center text-center">
                    <span class="bg-emerald-500/40 px-4 py-2 rounded-lg text-xs">{{ $campaign->status }}</span>
                </div>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
