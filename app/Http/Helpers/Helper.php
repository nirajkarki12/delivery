<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function uploadImage($image, $folder)
    {
        $fileName = Helper::fileName();
        $ext = $image->getClientOriginalExtension();
        $file = $folder .'/' .$fileName . "." . $ext;

        if(!Storage::disk('uploads')->put($file, file_get_contents($image->getRealPath()))) return false;
        return env('APP_URL') ."/storage/uploads/$file";
    }

    public static function deleteImage($image, $folder) {
        $path = env('APP_URL') ."/storage/uploads/$folder/";
        $image = str_replace($path, '', $image);
        $imagePath = "/$folder/$image";

        if(Storage::disk('uploads')->exists($imagePath)) {
            return Storage::disk('uploads')->delete($imagePath);
        }
        return false;
    }

    public static function fileName() {
        $name = time();
        $name .= rand();
        $name = sha1($name);

        return $name;
    }

}
