<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = ['brand', 'model', 'year', 'max_speed', 'is_automatic', 'engine', 'number_of_doors'];

    public static function scopeSearchByBrand($query, $brand)
    {
        if (!$brand) {
            return $query;
        }
        return self::where('brand', $brand);
    }

    public static function scopeSearchByModel($query, $model)
    {
        if (!$model) {
            return $query;
        }
        return self::where('model', $model);
    }
}
