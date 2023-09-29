<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'image',
        'order',
        'is_default'
    ];

    protected $table = 'product_images';
}
