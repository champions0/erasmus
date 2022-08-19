<?php

namespace App\Models;


use App\Traits\Models\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ActivityMl extends Model
{
    use HasCompositePrimaryKey;

    /**
     * @var string[]
     */
    protected $primaryKey = ['activity_id', 'lng_code'];

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
    protected $fillable = ['lng_code', 'name', 'text', 'short_description'];


    /**
     * @return string
     */
    public function getFilePathAttribute(): string
    {
        if ($this->file)
            return Storage::url($this->file);

        return '';
    }
}
