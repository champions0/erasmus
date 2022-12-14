<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MlService
{
    /**
     * @param Model $model
     * @param array $mlsData
     */
    public static function saveMl(Model $model, array $mlsData, string $fileKey = '', string $convertFileKey = ''): void
    {
        foreach ($mlsData as $lngCode => $mlData) {

            if ($fileKey && array_key_exists($fileKey, $mlData) && $mlData[$fileKey]) {

                $mlData[$fileKey] = FileService::storeFile($mlData[$fileKey], class_basename($model));
                $mlData[$convertFileKey] = FileService::convertToPdf(Storage::url($mlData[$fileKey]));
            }

            $model->mls()->updateOrCreate(
                [
                    Str::snake(class_basename($model)) . '_' . $model->getKeyName() => $model->id,
                    'lng_code' => $lngCode
                ],
                $mlData
            );
        }
    }
}
