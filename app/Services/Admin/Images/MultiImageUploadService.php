<?php


namespace App\Services\Admin\Images;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MultiImageUploadService
{

    public function execute($path, $images): string
    {

        $ImagesListBase64 = json_decode($images);

        $images = [];

        foreach ($ImagesListBase64 as $image) {
            $images[] = $this->uploadImage($path, $image->Base64);
        }

        return json_encode($images);

    }


    public function uploadImage($path, $image_file)
    {
        if ($image_file != "") {

            $file = base64_decode($image_file);

            $safeName = Str::random(10) . '_service.' . 'png';

            $destinationPath = public_path() . '/storage/' . $path . '/';

            file_put_contents($destinationPath . $safeName, $file);

            return $path . '/' . $safeName;
        }
    }


}
