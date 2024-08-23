<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'description',
        'sequence',
    ];


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    // public function getImageAttribute($value)
    // {
    //     if ($value) {
    //         return asset('image/projects/' . $value);
    //     }
    //     return asset('dummy/370x394.png');
    // }
}
