<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultiSelectInput extends Component
{
    private $name;
    private $options;
    private $selectedValues;
    private $keyOfValue;
    private $keyOfOption;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = null, $options = null, $keyOfOption = null, $keyOfValue = null, $selectedValues = [])
    {
        $this->name = $name;
        $this->keyOfOption = $keyOfOption;
        $this->keyOfValue = $keyOfValue;
        $this->options = $options;
        $this->selectedValues = $selectedValues;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('Components.admin.multi-select-input', [
            'name' => $this->name,
            'keyOfOption' => $this->keyOfOption,
            'keyOfValue' => $this->keyOfValue,
            'options' => $this->options,
            'selectedValues' => $this->selectedValues,
        ]);
    }
}
