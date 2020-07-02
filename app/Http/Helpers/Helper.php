<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function uploadImage($image, $folder = null)
    {
        $fileName = Helper::fileName();
        $ext = $image->getClientOriginalExtension();
        $file = $folder ? $folder .'/' .$fileName . "." . $ext : $fileName . "." . $ext;

        if(!Storage::disk('uploads')->put($file, file_get_contents($image->getRealPath()))) return false;
        return env('APP_URL') ."/storage/uploads/$file";
    }

    public static function deleteImage($image, $folder = null) {
			$path = env('APP_URL') ."/storage/uploads/" .($folder ? "$folder/" : null);
			$image = str_replace($path, '', $image);
			if(!$image) return;

		 	$imagePath = $folder ? "/$folder/$image" : "/$image";

			if(Storage::disk('uploads')->exists($imagePath)) {
				Storage::disk('uploads')->delete($imagePath);
			}
    }

    public static function fileName() {
        $name = time();
        $name .= rand();
        $name = sha1($name);

        return $name;
    }

}
