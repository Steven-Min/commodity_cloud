<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'system_variation_type_id',
        'name',
        'description'
    ];

    protected $table = 'variations';
}
