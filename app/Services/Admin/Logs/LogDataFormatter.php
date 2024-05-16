<?php


namespace App\Services\Admin\Logs;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LogDataFormatter
{

    /**
     * @param $data
     * @return string
     */
    public function format($data): string
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->format($value);
            }
        }

        if (is_object($data)) {
            return json_encode($data);
        }

        return $data;
    }
}
