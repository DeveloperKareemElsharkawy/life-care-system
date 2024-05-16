<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ColorSelectInput extends Component
{
    public $colors;
    public $name;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null, $colors = null)
    {
        $this->colors = $colors;
        $this->name = $name;
        $this->value = $value;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('Components.admin.color-select-input', [
            'name' => $this->name,
            'value' => $this->value
        ]);
    }
}
