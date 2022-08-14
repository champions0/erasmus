<?php

namespace App\Models;


use App\Traits\Models\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class PartnerMl extends Model
{
    use HasCompositePrimaryKey;

    /**
     * @var string[]
     */
    protected $primaryKey = ['partner_id', 'lng_code'];

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
    protected $fillable = ['lng_code', 'name', 'text'];
}
