<?php

namespace App\Models;

use App\Services\FileService;
use App\Services\MlService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Activity extends Model
{
    use HasFactory;

    const THUMB_SIZE = 380;

    /**
     * @var string[]
     */
    protected $fillable = ['order', 'slug', 'is_home', 'image', 'list_image'];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeHome(Builder $query): Builder
    {
        return $query->where('is_home', 1);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order');
    }

    /**
     * @return HasOne
     */
    public function currentMl(): HasOne
    {
        return $this->hasOne(ActivityMl::class)->where('lng_code', LaravelLocalization::getCurrentLocale());
    }

    /**
     * @return HasMany
     */
    public function mls(): HasMany
    {
        return $this->hasMany(ActivityMl::class);
    }

    /**
     * @param $value
     * @return string
     */
    public function getImageAttribute($value): string
    {
        if ($value)
            return Storage::url($value);

        return '';
    }

    /**
     * @param $value
     * @return string
     */
    public function getListImageAttribute($value): string
    {
        if ($value)
            return Storage::url($value);

        return '';
    }

    /**
     * @return bool
     */
    public function isImage(): bool
    {
        if ($this->list_image) {
            $imageExtensions = ['jpg','jpeg','png'];

            $explodeImage = explode('.', $this->list_image);
            $extension = end($explodeImage);

            return in_array($extension, $imageExtensions);
        }

        return true;
    }

    /**
     * @param $value
     * @return string
     */
    public function getThumbImageAttribute($value): string
    {
        if ($this->image) {
            return Storage::url("/thumb/" . self::THUMB_SIZE . "/" . $this->getRawOriginal('image'));
        }

        return '';
    }

    /**
     * @param array $data
     * @param Activity|null $activity
     * @return void
     */
    public static function saveData(array $data, ?self $activity = null): void
    {
        if (array_key_exists('image', $data) && $data['image']) {
            $data['image'] = FileService::storeImage($data['image'], 'activities', [self::THUMB_SIZE]);
        }
        if (array_key_exists('list_image', $data) && $data['list_image']) {
            $data['list_image'] = FileService::storeImage($data['list_image'], 'activities');
        }

        if ($activity) {
            $activity->update($data);
        } else {
            $activity = self::create($data);
        }

        MlService::saveMl($activity, $data['ml']);
    }
}
