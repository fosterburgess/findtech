<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class TagMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $tags, public array $selectedTags = [], public string $search = '')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tag-menu');
    }
}
