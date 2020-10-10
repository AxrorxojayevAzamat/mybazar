<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Image;
use Intervention\Image\Constraint;
use Illuminate\Support\Facades\File;

class SeederImageHelper {

    public static function uploadImage(int $id, string $folderName, string $path, string $imageName): void {
        self::saveThumbnail($id, $folderName, $path, $imageName);
        self::saveOriginal($id, $folderName, $path, $imageName);
    }

    public static function uploadVideo(int $id, string $folderName, string $path, string $videoName): void {
        self::saveVideoFile($id, $folderName, $path, $videoName);
    }

    public static function getRandomName(string $path): string {
        return Str::random(40) . '.' . File::extension($path);
    }

    public static function saveThumbnail(int $id, string $folderName, string $path, string $imageName, int $width = 256, int $height = 192) {
        $destinationPath = ImageHelper::getThumbnailPath($id, $folderName);
        ImageHelper::makeDirectory($destinationPath);
        $resizeImage = Image::make($path);
        $resizeImage->resize(256, 192, function(Constraint $constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imageName);

        self::changeThumbnailOwner($id, $folderName, $imageName);
    }

    public static function saveOriginal(int $id, string $folderName, string $path, string $imageName) {
        $destinationPath = ImageHelper::getOriginalPath($id, $folderName);
        ImageHelper::makeDirectory($destinationPath);
        File::copy($path, $destinationPath . '/' . $imageName);

        self::changeOriginalOwner($id, $folderName, $imageName);
    }

    public static function saveVideoFile(int $id, string $folderName, string $path, string $videoName) {
        $destinationPath = ImageHelper::getRealPath($id, $folderName);
        File::copy($path, $destinationPath . DIRECTORY_SEPARATOR . $videoName);
        
        self::changeVideoOwner($id, $folderName, $videoName);
    }

    public static function deleteFolder(string $folderName) {
        $folder = storage_path('app/public/files/' . $folderName);
        if (is_dir($folder)) {
            File::deleteDirectory($folder);
        } else {
            echo "Directory does not exist";
        }
    }

    public static function changeOwner(string $path) {
        chown($path, 'www-data');
        chgrp($path, 'www-data');
    }

    public static function changeThumbnailOwner(int $id, string $folderName, string $imageName) {
        self::changeOwner(ImageHelper::getRealPath($id, $folderName));
        self::changeOwner(ImageHelper::getThumbnailPath($id, $folderName));
        self::changeOwner(ImageHelper::getThumbnailPath($id, $folderName) . DIRECTORY_SEPARATOR . $imageName);
    }

    public static function changeOriginalOwner(int $id, string $folderName, string $imageName) {
        self::changeOwner(ImageHelper::getRealPath($id, $folderName));
        self::changeOwner(ImageHelper::getOriginalPath($id, $folderName));
        self::changeOwner(ImageHelper::getOriginalPath($id, $folderName) . DIRECTORY_SEPARATOR . $imageName);
    }

    public static function changeVideoOwner(int $id, string $folderName, string $videoName) {
        self::changeOwner(ImageHelper::getRealPath($id, $folderName) . DIRECTORY_SEPARATOR . $videoName);
    }
    public static function changeIdOwner(int $id, string $folderName) {
        self::changeOwner(ImageHelper::getRealPath($id, $folderName));
    }

}
