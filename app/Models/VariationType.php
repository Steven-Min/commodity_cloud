<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationType extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    protected $table = 'variation_types';
}
