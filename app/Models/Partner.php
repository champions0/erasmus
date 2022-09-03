<?php

namespace App\Models;

use App\Services\FileService;
use App\Services\MlService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Partner extends Model
{
    use HasFactory;

    const THUMB_SIZE = 140;

    /**
     * @var string[]
     */
        protected $fillable = ['website', 'facebook', 'image', 'is_home'];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeHome(Builder $query): Builder
    {
        return $query->where('is_home', 1);
    }

    /**
     * @return HasOne
     */
    public function currentMl(): HasOne
    {
        return $this->hasOne(PartnerMl::class)->where('lng_code', LaravelLocalization::getCurrentLocale());
    }

    /**
     * @return HasMany
     */
    public function mls(): HasMany
    {
        return $this->hasMany(PartnerMl::class);
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
    public function getThumbImageAttribute($value): string
    {
        if ($this->image) {
            return Storage::url("/thumb/" . self::THUMB_SIZE . "/" . $this->getRawOriginal('image'));
        }

        return '';
    }

    /**
     * @param array $data
     * @param Partner|null $partner
     * @return void
     */
    public static function saveData(array $data, ?self $partner = null): void
    {
        if (array_key_exists('image', $data) && $data['image']) {
            $data['image'] = FileService::storeImage($data['image'], 'partners', [self::THUMB_SIZE]);
        }

        if ($partner) {
            $partner->update($data);
        } else {
            $partner = self::create($data);
        }

        MlService::saveMl($partner, $data['ml']);
    }
}
