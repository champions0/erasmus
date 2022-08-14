<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MlService
{
    /**
     * @param Model $model
     * @param array $mlsData
     */
    public static function saveMl(Model $model, array $mlsData): void
    {
        foreach ($mlsData as $lngCode => $mlData) {

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
