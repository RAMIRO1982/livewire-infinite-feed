<?php

namespace RAMIRO1982\LivewireInfiniteFeed\Components;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\View;

class InfiniteFeed extends Component
{
    use WithPagination;

    public string $model;
    public int $perPage = 10;
    public ?string $view = null;

    protected array $queryString = ['page'];

    public function render()
    {
        $modelClass = $this->model;
        $items = $modelClass::latest()->paginate($this->perPage);

        return View::make($this->view ?? 'infinite-feed::feed', [
            'items' => $items,
        ]);
    }
}
