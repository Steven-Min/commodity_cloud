<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SmallCategory extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'sub_category_id',
        'sort',
    ];

    protected $table = 'small_categories';

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}
