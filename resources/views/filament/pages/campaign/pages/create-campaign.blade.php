<x-filament-panels::page>
    <form wire:submit="create">
        {{ $this->form }}
        
        <div class="mt-4">
            <x-filament::button type="submit">
                Add New Campaign
            </x-filament::button>
        </div>
    </form>
    
        
    <x-filament-actions::modals />
</x-filament-panels::page>
