<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 */
class TransportRoute extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(City::class,'id', 'city_id');
    }
}
