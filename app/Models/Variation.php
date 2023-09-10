<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'variation_type_id',
        'name',
        'description',
        'user_id'
    ];

    protected $table = 'variations';
}
