<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image as Image;

class Helper
{

    public static function saveImage($image, $width, $height)
    {
        $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize($width, $height)->save('backend/uploads/images/projects/' . $image_rename);
        $image_url = 'backend/uploads/images/projects/' . $image_rename;
        $img = $image_url;
        return $img;
    }
}
