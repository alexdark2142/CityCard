<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static findOrfail($id)
 * @method static orderBy(string $string, string $string1)
 */
class CardType extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    protected $fillable = [
        'name',
        'cost_in_percent',
    ];
}
