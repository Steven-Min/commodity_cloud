<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SubCategory extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'category_id',
        'sort',
    ];

    protected $table = 'sub_categories';

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }

    public function smallCategories()
    {
        return $this->hasMany(SmallCategory::class);
    }
}
