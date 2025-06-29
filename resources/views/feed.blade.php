<div>
    @foreach ($this->items as $item)
        <div class="p-4 border-b">{{ $item->title ?? 'No title' }}</div>
    @endforeach

    @if ($this->hasMorePages)
        <div x-data x-intersect.full.once="() => { if (!@this.loading) $wire.loadMore(); }" class="h-1 translate-y-32"
             wire:ignore.self></div>

        <div wire:loading.flex wire:target="loadMore" class="flex justify-center items-center w-full">
            <flux:icon.loading class="size-8"/>
        </div>
    @endif
</div>
