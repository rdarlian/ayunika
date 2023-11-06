<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CloudinaryStorage extends Controller
{
    private const folder_path = 'pxl-ayunika-dev';

    public static function path($path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }
    // upload to cloudinary from storage
    public static function upload($image, $filename)
    {
        // $newFilename = str_replace(' ', '_', $filename);
        // $public_id = date('Y-m-d_His').'_'.$newFilename;
        $result = Cloudinary::upload($image, [
            "public_id" => self::path($filename),
            "folder"    => self::folder_path
        ])->getSecurePath();

        return $result;
    }

    public static function replace($path, $image, $public_id)
    {
        self::delete($path);
        return self::upload($image, $public_id);
    }

    public static function delete($path)
    {
        $public_id = self::folder_path . '/' . self::path($path);
        return Cloudinary::destroy($public_id);
    }
}
