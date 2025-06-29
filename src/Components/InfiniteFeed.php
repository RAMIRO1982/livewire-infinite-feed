<?php

namespace RAMIRO1982\LivewireInfiniteFeed\Components;

use Livewire\Component;
use Illuminate\Support\Facades\View;

class InfiniteFeed extends Component
{
    public string $model;
    public array $with = [];
    public int $perPage = 10;
    public ?string $view = null;
    public $cursor = null;
    public bool $hasMorePages = true;
    public array $items = [];
    public bool $loading = false;

    public function mount(): void
    {
        $this->with = array_filter($this->with);

        $this->loadMore();
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

        return $modelClass::query()->latest();
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
