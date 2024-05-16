<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class BootstrabFileInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$defaultValue = null)
    {
        $this->name = $name;
        $this->defaultValue = $defaultValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('Components.admin.bootstrab-file-input',[
            'name' => $this->name,
            'defaultValue' => $this->defaultValue,
        ]);
    }
}
