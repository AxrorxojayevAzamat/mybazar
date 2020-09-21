<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Image;
use Intervention\Image\Constraint;

class ImageHelper
{
    const THUMBNAIL_NAME = 'thumbs';

    const FOLDER_BRANDS = 'brands';
    const FOLDER_MARKS = 'marks';
    const FOLDER_STORES = 'stores';
    const FOLDER_PAYMENTS = 'payments';
    const FOLDER_PRODUCTS = 'products';
    const FOLDER_MODIFICATIONS = 'modifications';
    const FOLDER_BANNERS = 'banners';
    const FOLDER_SLIDERS = 'sliders';
    const FOLDER_NEWS = 'news';
    const FOLDER_POSTS = 'posters';
    const FOLDER_VIDEOS = 'videos';

    const TYPE_THUMBNAIL = 'thumbs';
    const TYPE_ORIGINAL = 'original';

    public static function uploadResizedImage(int $id, string $folderName, UploadedFile $image, string $imageName = null): string
    {
        $imageName = $imageName ?: Str::random(40) . '.' . $image->getClientOriginalExtension();

        self::saveThumbnail($id, $folderName, $image, $imageName);

        self::saveOriginal($id, $folderName, $image, $imageName);

        return $imageName;
    }

    public static function saveThumbnail(int $id, string $folderName, UploadedFile $image, string $imageName, int $width = 256, int $height = 192)
    {
        $destinationPath = self::getThumbnailPath($id, $folderName);

        self::makeDirectory($destinationPath);

        $resizeImage = Image::make($image->getRealPath());
        $resizeImage->resize(256, 192, function(Constraint $constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imageName);
    }

    public static function saveOriginal(int $id, string $folderName, UploadedFile $image, string $imageName)
    {
        $destinationPath = self::getOriginalPath($id, $folderName);
        $image->move($destinationPath, $imageName);
    }

    public static function saveVideoFile(int $id, string $folderName, UploadedFile $video, string $videoName)
    {
        $destinationPath = self::getRealPath($id, $folderName);
        $video->move($destinationPath, $videoName);
    }

    public static function uploadImage(UploadedFile $image): string
    {
        $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/files/brands/original');
        $image->move($destinationPath, $imageName);
        return $imageName;
    }

    public static function getRandomName(UploadedFile $file): string
    {
        return Str::random(40) . '.' . $file->getClientOriginalExtension();
    }

    public static function getThumbnailPath(int $id, string $folderName)
    {
        return self::getStoragePath($id, $folderName, self::TYPE_THUMBNAIL);
    }

    public static function getOriginalPath(int $id, string $folderName)
    {
        return self::getStoragePath($id, $folderName, self::TYPE_ORIGINAL);
    }

    public static function getRealPath(int $id, string $folderName)
    {
        return self::getStoragePath($id, $folderName);
    }

    public static function getStoragePath(int $id, string $folderName, string $fileType = null): string
    {
        return storage_path('app/public/files/' . $folderName . '/' . $id . ($fileType ? '/' . $fileType : ''));
    }

    public static function makeDirectory(string $path, int $permission = 0777, bool $recursive = true): bool
    {
        if (!file_exists($path)) {
            return mkdir($path, $permission, $recursive);
        }
        return true;
    }
}
