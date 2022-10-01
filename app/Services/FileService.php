<?php

namespace App\Services;

use CURLFile;
use DOMDocument;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileService
{
    /**
     * @param $file
     * @param $path
     * @param null $driver
     * @return string
     */
    public static function storeFile($file, $path, $driver = null): string
    {
        $storage = self::getStorage($driver);
        $fileName = uniqid() . Str::slug($file->getClientOriginalName(), '.');
        $filePath = '/' . strtolower($path) . '/' . $fileName;
        $storage->put($filePath, file_get_contents($file), 'public');

        return $filePath;
    }

    /**
     * @param $image
     * @param $path
     * @param array $widths
     * @param null $driver
     * @return string
     */
    public static function storeImage($image, $path, $widths = [], $driver = null): string
    {
        $storage = self::getStorage($driver);
        $fileName = uniqid() . Str::slug($image->getClientOriginalName(), '.');
        $filePath = '/' . $path . '/' . $fileName;
        $storage->put($filePath, file_get_contents($image), 'public');
        if (count($widths)) {
            self::attachmentThumb($image, $filePath, $widths, $storage);
        }

        return $filePath;
    }

    /**
     * @param $input
     * @param $name
     * @param $path
     * @param $widths
     * @param $storage
     */
    public static function attachmentThumb($input, $filePath, $widths, $storage): void
    {
        foreach ($widths as $width) {
            self::attachment($input, $filePath, $width, $storage);
        }
    }

    /**
     * @param $input
     * @param $name
     * @param $path
     * @param $storage
     * @param $width
     */
    public static function attachment($input, $filePath, $width, $storage): void
    {
        try {
            $img = Image::make($input)->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            })->response();
            $filePath = "thumb/$width/" . $filePath;
            $storage->put($filePath, $img->getContent(), 'public');

        } catch (\Exception $e) {
        }
    }

    /**
     * @param $driver
     * @return Filesystem
     */
    private static function getStorage($driver): Filesystem
    {
        $driver = $driver ?: config('filesystems.default');

        return Storage::disk($driver);
    }

    /**
     * @param string $path
     * @return string
     */
    static function convertToPdf(string $path, string $key = null, bool $check = true): string
    {
        if (!$key) {
            $key = config('services.pspdfkit.key');
        }
        $openFileUrl = '/images/' . time() . Str::random() . '.jpg';
        $FileHandle = fopen('storage' . $openFileUrl, 'w+');

        $curl = curl_init();

        $instructions = '{
              "parts": [
                {
                  "file": "document"
                }
              ],
              "output": {
                "type": "image",
                "format": "jpg",
                "dpi": 120
              }
            }';

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.pspdfkit.com/build',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_POSTFIELDS => array(
                'instructions' => $instructions,
                'document' => new CURLFILE($path)
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $key
            ),
            CURLOPT_FILE => $FileHandle,
        ));

        $response = curl_exec($curl);
        if (!$response && $check) {
            self::convertToPdf($path, config('services.pspdfkit.second_key'), false);
        }
        curl_close($curl);

        fclose($FileHandle);
        return $openFileUrl;
    }

    static function getImagesFromHtml(string $html): array
    {
        $doc = new DOMDocument();
        $doc->loadHTML($html);

        $xml = simplexml_import_dom($doc);
        $images = $xml->xpath('//img');
        $srcs = [];
        foreach ($images as $img) {

            $srcs[] = (string)$img['src'];
        }

        return $srcs;
    }
}
