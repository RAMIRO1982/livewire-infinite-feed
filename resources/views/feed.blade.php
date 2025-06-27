<div
        x-data="{
        observe() {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        $wire.set('page', $wire.page + 1)
                    }
                });
            }, { threshold: 1.0 });
            observer.observe(this.$el);
        }
    }"
        x-init="observe()"
        wire:init="render"
>
    @foreach ($items as $item)
        <div class="p-4 border-b">{{ $item->title ?? 'No title' }}</div>
    @endforeach

    @if ($items->hasMorePages())
        <div class="p-4 text-center text-gray-500">Loading more...</div>
    @endif
</div>
