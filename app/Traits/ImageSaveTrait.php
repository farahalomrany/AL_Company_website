<?php

namespace App\Traits;

use App\Models\Imagesconfig;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait ImageSaveTrait
{

    public function check_validation_and_save_croped_image($request, $table_name, $field_name, $folder_name)
    {
        $validator = Validator::make($request->all(), [
            $field_name => 'required|image|mimes:jpg,png,jpeg'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        return $this->save_crop_image($request, $table_name, $field_name, $folder_name);
    }

    public function save_crop_image($request, $table_name, $field_name, $folder_name)
    {
        $imgSrc = $request->$field_name;
        list($width, $height) = getimagesize($imgSrc);
        $file = $request->file($field_name)->getClientOriginalName();

        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension == "png") {

            $myImage = imagecreatefrompng($imgSrc);

        } else {
            $myImage = imagecreatefromjpeg($imgSrc);

        }
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }
        $imconfig = Imagesconfig::where('table_name', '=', $table_name)->where('field_name', '=', $field_name)->first();
        if ($imconfig) {
            $thumbSizew = $imconfig->width;
            $thumbSizeh = $imconfig->hight;

            // $thumb = imagecreatetruecolor($thumbSizew, $thumbSizeh);
            // $transparent=imagefill($thumb, 0, 0, imagecolorallocatealpha($thumb, 255, 255, 255, 127));

            // imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSizew, $thumbSizeh, $smallestSide, $smallestSide);
            $myImage = imagecrop($myImage, ['x' => 0, 'y' => 0, 'width' => $thumbSizew, 'height' => $thumbSizeh]);

            $image_name = $folder_name . Str::random(25) . $file;
            $image = $folder_name . "/";
            $image_path = $image . $image_name;
            $path = 'storage/' . $folder_name . '/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if ($extension == "png") {
                imagepng($myImage, public_path($path) . $image_name);

            } else {
                imagejpeg($myImage, public_path($path) . $image_name);

            }
            return $image_path;
        } else {
            $thumbSizew = $width;
            $thumbSizeh = $height;
            $image_name = $folder_name . Str::random(25) . $file;
            $image = $folder_name . "/";
            $image_path = $image . $image_name;
            $path = 'storage/' . $folder_name . '/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if ($extension == "png") {
                imagepng($myImage, public_path($path) . $image_name);

            } else {
                imagejpeg($myImage, public_path($path) . $image_name);

            }
            return $image_path;

        }
    }
    // public function save_crop_image($request, $table_name, $field_name, $folder_name)
    // {
    //     $imgSrc = $request->$field_name;
    //     list($width, $height) = getimagesize($imgSrc);
    //     $file = $request->file($field_name)->getClientOriginalName();

    //     $extension = pathinfo($file, PATHINFO_EXTENSION);
    //     if ($extension == "png") {

    //         $myImage = imagecreatefrompng($imgSrc);

    //     } else {
    //         $myImage = imagecreatefromjpeg($imgSrc);

    //     }
    //     if ($width > $height) {
    //         $y = 0;
    //         $x = ($width - $height) / 2;
    //         $smallestSide = $height;
    //     } else {
    //         $x = 0;
    //         $y = ($height - $width) / 2;
    //         $smallestSide = $width;
    //     }
    //     $imconfig = Imagesconfig::where('table_name', '=', $table_name)->where('field_name', '=', $field_name)->first();
    //     if ($imconfig) {
    //         $thumbSizew = $imconfig->width;
    //         $thumbSizeh = $imconfig->hight;

    //         $thumb = imagecreatetruecolor($thumbSizew, $thumbSizeh);
    //         imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSizew, $thumbSizeh, $smallestSide, $smallestSide);
    //         $image_name = $folder_name . Str::random(25) . $file;
    //         $image = $folder_name . "/";
    //         $image_path = $image . $image_name;
    //         $path = 'storage/' . $folder_name . '/';
    //         if (!file_exists($path)) {
    //             mkdir($path, 0777, true);
    //         }
    //         if ($extension == "png") {
    //             imagepng($thumb, public_path($path) . $image_name);

    //         } else {
    //             imagejpeg($thumb, public_path($path) . $image_name);

    //         }
    //         return $image_path;
    //     } else {
    //         $thumbSizew = $width;
    //         $thumbSizeh = $height;
    //         $image_name = $folder_name . Str::random(25) . $file;
    //         $image = $folder_name . "/";
    //         $image_path = $image . $image_name;
    //         $path = 'storage/' . $folder_name . '/';
    //         if (!file_exists($path)) {
    //             mkdir($path, 0777, true);
    //         }
    //         if ($extension == "png") {
    //             imagepng($myImage, public_path($path) . $image_name);

    //         } else {
    //             imagejpeg($myImage, public_path($path) . $image_name);

    //         }
    //         return $image_path;

    //     }
    // }
}