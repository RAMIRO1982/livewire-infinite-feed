<?php

namespace RAMIRO1982\LivewireInfiniteFeed\Components;

use Illuminate\Support\Facades\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class InfiniteFeed extends Component
{
    #[Url]
    public $itemId = '';

    public string $model;
    public array $with = [];
    public int $perPage = 10;
    public ?string $placeholder = null;
    public ?string $view = null;
    public $cursor = null;
    public bool $hasMorePages = true;
    public array $items = [];
    public bool $loading = false;

    protected $listeners = [
        'item-added' => '$refresh',
    ];

    public function mount(): void
    {
        if (!class_exists($this->model)) {
            throw new \InvalidArgumentException("Model class [{$this->model}] does not exist.");
        }

        $this->with = array_filter($this->with);

        $this->loadMore();
    }

    public function placeholder()
    {
        return View::make($this->placeholder ?? 'infinite-feed::placeholder');
    }

    public function loadMore(): void
    {
        if ($this->loading || ! $this->hasMorePages) return;

        $query = $this->addWith($this->createQuery());

        $this->loading = true;
        $this->addItems($query);
        $this->loading = false;
    }

    public function render()
    {
        return View::make($this->view ?? 'infinite-feed::feed');
    }
    
    private function createQuery()
    {
        $modelClass = $this->model;

        return $modelClass::query()
            ->when($this->itemId, fn($query) => $query->where('id', $this->itemId))
            ->latest();
    }

    private function addWith($query)
    {
        if ($this->with) {
            $query->with($this->with);
        }

        return $query;
    }

    private function addItems($query): void
    {
        $results = $query->cursorPaginate($this->perPage, ['*'], 'cursor', $this->cursor);

        $this->cursor = $results->nextCursor()?->encode();
        $this->hasMorePages = $results->hasMorePages();

        $this->items =  array_merge($this->items, $results->items());
    }

}
