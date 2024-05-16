<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropDownInput extends Component
{
    /**
     * @var mixed|null
     */
    private $name;
    private $selected;
    private $options;
    private $keyOfOption;
    private $keyOfValue;
    private $label;
    /**
     * @var mixed|null
     */
    private $class;
    /**
     * @var false|mixed
     */
    private $readonly;
    private $isRequired;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $options, $selected = null, $keyOfValue = null, $keyOfOption = null , $label = null,$class = null,$readonly = null,$isRequired = false)
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->options = $options;
        $this->keyOfValue = $keyOfValue;
        $this->keyOfOption = $keyOfOption;
        $this->label = $label;
        $this->class = $class;
        $this->readonly = $readonly;
        $this->isRequired = $isRequired;

    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $label = $this->label ?: $this->name;
        return view('Components.admin.drop-down-input', [
            'name' => $this->name,
            'selected' => $this->selected,
            'options' => $this->options,
            'keyOfValue' => $this->keyOfValue,
            'keyOfOption' => $this->keyOfOption,
            'label' => $label,
            'class' => $this->class,
            'readonly' => $this->readonly,
            'isRequired' => $this->isRequired

        ]);
    }
}
