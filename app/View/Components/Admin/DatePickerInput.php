<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePickerInput extends Component
{
    private $name;
    private $value;
    /**
     * @var false|mixed
     */
    private $required;
    /**
     * @var mixed|string
     */
    private $placeholder;
    /**
     * @var false|mixed
     */
    private $disabled;
    private $label;
    /**
     * @var \Illuminate\Config\Repository|Application|mixed
     */
    private $dateTimeFormat;

    private $isRequired;
    private $class;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null, $placeholder = '', $required = false, $disabled = false, $label = null, $dateTimeFormat = null,$isRequired = false,$class = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->label = $label;
        $this->dateTimeFormat = $dateTimeFormat;
        $this->isRequired = $isRequired;
        $this->class = $class;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $label = $this->label ?? $this->name;
        $dateTimeFormat = $this->dateTimeFormat ?? 'fk-datepicker';

        return view('Components.admin.date-picker-input', [
            'name' => $this->name,
            'value' => $this->value,
            'placeholder' => $this->placeholder,
            'required' => $this->required,
            'disabled' => $this->disabled,
            'label' => $label,
            'dateTimeFormat' => $dateTimeFormat,
            'isRequired' => $this->isRequired,
            'class' => $this->class

        ]);
    }
}
