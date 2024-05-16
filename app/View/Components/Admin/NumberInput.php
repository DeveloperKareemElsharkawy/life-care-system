<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NumberInput extends Component
{
    private $name;
    private $value;
    private $groupWithText;
    private $groupWithHTML;
    /**
     * @var mixed|null
     */
    private $label;
    /**
     * @var mixed|null
     */
    private $class;
    /**
     * @var mixed|null
     */
    private $readonly;
    private $isRequired;
    /**
     * @var mixed|null
     */
    private $symbol;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null, $groupWithText = null, $groupWithHtml = null, $label = null,$class = null,$readonly = null,$isRequired = false,$symbol = null)

    {
        $this->name = $name;
        $this->value = $value;
        $this->groupWithText = $groupWithText;
        $this->groupWithHTML = $groupWithHtml;
        $this->label = $label;
        $this->class = $class;
        $this->readonly = $readonly;
        $this->isRequired = $isRequired;
        $this->symbol = $symbol;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $label = $this->label ?: $this->name;
        return view('Components.admin.number-input', [
            'label' => $label,
            'name' => $this->name,
            'value' => $this->value,
            'groupWithText' => $this->groupWithText,
            'groupWithHTML' => $this->groupWithHTML,
            'class' => $this->class,
            'readonly' => $this->readonly,
            'isRequired' => $this->isRequired,
            'symbol' => $this->symbol
        ]);
    }
}
