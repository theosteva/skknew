<x-filament::page>
    <form wire:submit="submit">
        {{ $this->form }}

        <x-filament::button type="submit" class="mt-4">
            Save Changes
        </x-filament::button>
    </form>
</x-filament::page> 