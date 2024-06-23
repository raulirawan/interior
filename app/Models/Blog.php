<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'name',
        'slug',
        'image',
        'description',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('image/blogs/' . $value);
        }
        return asset('dummy/750x375.png');
    }
}
