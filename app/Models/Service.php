<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('image/services/' . $value);
        }
        return asset('dummy/370x268.png');
    }
}
