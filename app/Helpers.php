<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image as Image;

class Helper
{

    public static function saveImage($image, $width, $height, $path)
    {
        $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize($width, $height)->save('backend/uploads/images/'.$path.'/' . $image_rename);
        $image_url = 'backend/uploads/images/'.$path.'/' . $image_rename;
        $img = $image_url;
        return $img;
    }
}
