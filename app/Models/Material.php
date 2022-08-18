<?php

namespace App\Models;

use App\Services\FileService;
use App\Services\MlService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Material extends Model
{
    use HasFactory;

    const THUMB_SIZE = 140;

    /**
     * @var string[]
     */
    protected $fillable = ['is_home'];

    /**
     * @return HasOne
     */
    public function currentMl(): HasOne
    {
        return $this->hasOne(MaterialMl::class)->where('lng_code', LaravelLocalization::getCurrentLocale());
    }

    /**
     * @return HasMany
     */
    public function mls(): HasMany
    {
        return $this->hasMany(MaterialMl::class);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeHome(Builder $query): Builder
    {
        return $query->where('is_home', 1);
    }

    /**
     * @param array $data
     * @param Material|null $material
     * @return void
     */
    public static function saveData(array $data, ?self $material = null): void
    {
        if ($material) {
            $material->update($data);
        } else {
            $material = self::create($data);
        }

        MlService::saveMl($material, $data['ml'], 'file');
    }
}
