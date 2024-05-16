<?php

namespace App\Rules\Admin\Worker;

use Illuminate\Contracts\Validation\Rule;

class CheckExperience implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {

        foreach ($value as $experience) {
            if (count($experience) == 1 && $experience['start_date'] == null && $experience['end_date'] == null && $experience['country_id'] == null) {
                return true;
            }
        } // check if admin want to remove all Worker Experience

        foreach ($value as $experience) {
            if ($experience['start_date'] == null || $experience['end_date'] == null || $experience['country_id'] == null) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('admin/datatable.invalid_worker_experience');
    }
}
