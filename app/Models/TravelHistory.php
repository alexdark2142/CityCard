<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static whereCardId($id)
 */
class TravelHistory extends Model
{
    use HasFactory;

    /**
     * @return HasOne
     */
    public function route(): HasOne
    {
        return $this->hasOne(TransportRoute::class,'id', 'transport_route_id')->with('city');
    }
}
