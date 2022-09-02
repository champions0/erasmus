<?php

namespace App\Models;


use App\Traits\Models\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MaterialMl extends Model
{
    use HasCompositePrimaryKey;

    /**
     * @var string[]
     */
    protected $primaryKey = ['material_id', 'lng_code'];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['lng_code', 'name', 'text', 'file', 'image'];


    /**
     * @return string
     */
    public function getFilePathAttribute(): string
    {
        if ($this->file)
            return Storage::url($this->file);

        return '';
    }

    /**
     * @return string
     */
    public function getImageAttribute($value): string
    {
        if ($value)
            return Storage::url($value);

        return '';
    }
}
