<?php


namespace App\Services\Admin\Files;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UploadFileService
{

    public static function execute($path, $file): string
    {
        $fileName = $file->getClientOriginalName();
        $generatedFileName = 'file_' . rand(10, 100) . mt_rand(20, 80) . mt_rand(1, 20) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

        return Storage::putFileAs('admin-panel/' . $path, new File($file), $generatedFileName);
    }

}
