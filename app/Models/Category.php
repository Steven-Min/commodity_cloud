<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'sort'
    ];

    protected $table = 'categories';

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}
