<?php

namespace App\View\Components;

use App\Models\Field;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FieldTabs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $fields = Field::get();
        return view('components.field-tabs', [
            'fields' => $fields,
        ]);
    }
}
