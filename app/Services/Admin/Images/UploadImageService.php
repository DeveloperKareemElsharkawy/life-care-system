<?php


namespace App\Services\Admin\Images;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UploadImageService
{

    public static function execute($path, $file): string
    {
        return Storage::put('admin-panel/' . $path, new File($file));
    }

}
