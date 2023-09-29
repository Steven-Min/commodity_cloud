<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariationImage extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'product_variation_id',
        'image',
        'order',
        'is_default'
    ];

    protected $table = 'product_variation_images';
}
