<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxInput extends Component
{
    public $name;
    /**
     * @var mixed|null
     */
    public $value;
    /**
     * @var mixed|null
     */
    private $details;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null,$details = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->details = $details;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('Components.admin.checkbox-input', [
            'name' => $this->name,
            'value' => $this->value,
            'details' => $this->details,
        ]);
    }
}
