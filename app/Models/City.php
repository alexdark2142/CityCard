<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static create(array $array)
 * @method static findOrfail($id)
 * @method static orderBy(string $string, string $string1)
 */
class City extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
