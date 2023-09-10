<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class VariationType extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    protected $table = 'system_variation_types';
}
