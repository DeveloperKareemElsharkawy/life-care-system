<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Select2 extends Component
{
    public $label;
    public $name;
    public $readonly;
    public $options;
    public $selected;
    public $keyOfValue;
    public $keyOfOption;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $name
     * @param bool $readonly
     * @param array $options
     * @param mixed $selected
     * @param string|null $keyOfValue
     * @param string|null $keyOfOption
     * @param string $class
     * @return void
     */
    public function __construct($label, $name, $readonly = false, $options = [], $selected = null, $keyOfValue = null, $keyOfOption = null, $class = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->readonly = $readonly;
        $this->options = $options;
        $this->selected = $selected;
        $this->keyOfValue = $keyOfValue;
        $this->keyOfOption = $keyOfOption;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Components.admin.select2');
    }
}
