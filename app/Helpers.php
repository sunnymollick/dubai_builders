<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image as Image;

class Helper
{

    public static function saveImage($image, $width, $height, $path)
    {
        $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize($width, $height)->save('backend/uploads/images/' . $path . '/' . $image_rename);
        $image_url = 'backend/uploads/images/' . $path . '/' . $image_rename;
        $img = $image_url;
        return $img;
    }
    public static function uniqueNumberConvertor($code, $year, $latest_id)
    {
        $latest_id = $latest_id + 1;
        return $code . $year . str_pad($latest_id, 3, "0", STR_PAD_LEFT);
    }
}
