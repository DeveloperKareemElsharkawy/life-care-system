<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    public $name;
    /**
     * @var mixed|null
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null,$groupWith = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->groupWith = $groupWith;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $value = $this->value ?? old($this->name);
        return view('Components.admin.text-input', [
            'name' => $this->name,
            'value' => $value,
            'groupWith' => $this->groupWith
        ]);
    }
}
