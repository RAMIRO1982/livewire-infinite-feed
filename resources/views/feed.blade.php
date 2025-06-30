<div>
    @foreach ($this->items as $item)
        @include($this->itemView, [$this->getItemVariableName() => $item])
    @endforeach

    @if ($this->hasMorePages)
        <div x-data x-intersect.full.once="() => { if (!@this.loading) $wire.loadMore(); }" class="h-1 translate-y-32"
             wire:ignore.self></div>

        <div wire:loading.flex wire:target="loadMore" class="flex justify-center items-center w-full" role="status"
             aria-busy="true">
            <flux:icon.loading class="size-8"/>
        </div>
    @endif
</div>
