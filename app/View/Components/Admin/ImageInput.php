<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ImageInput extends Component
{
    private $name;
    private $defaultValue;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $defaultValue = null)
    {
        $this->name = $name;
        $this->defaultValue = $defaultValue;
    }


    /**
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Components.admin.image-input', [
            'name' => $this->name,
            'defaultValue' => $this->defaultValue,
        ]);
    }
}
