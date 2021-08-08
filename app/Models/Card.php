<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static findOrfail(mixed $get)
 * @method static create(array $all)
 * @method static whereUserId($userId)
 */
class Card extends Model
{
    use HasFactory;

    /** @var string[] */
    protected $fillable = [
        'user_id',
        'number',
        'city_id',
        'card_type_id',
    ];

    /**
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    /**
     * @return HasOne
     */
    public function cardType(): HasOne
    {
        return $this->hasOne(CardType::class, 'id', 'card_type_id');
    }

    /**
     * @return HasMany
     */
    public function travelHistory(): HasMany
    {
        return $this->hasMany(TravelHistory::class);
    }

    /**
     * @return HasMany
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
