<?php

namespace App\Rules\General;

use App\Models\Worker;
use Illuminate\Contracts\Validation\Rule;

class NationalityProcessRule implements Rule
{
    private $workerId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($workerId)
    {
        $this->workerId = $workerId;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $worker = Worker::query()->with('nationality.ProcessSteps')->find($this->workerId); // Selected Worker

        $orderProcess = $worker->nationality->processSteps; // Processes Steps By Worker Nationality

        return count($orderProcess) > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'This Worker Nationality Has No Processes';
    }
}
