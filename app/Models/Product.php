<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sku',
        'description',
        'base_price',
        'default_image',
        'user_id',
    ];

    protected $table = 'products';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
