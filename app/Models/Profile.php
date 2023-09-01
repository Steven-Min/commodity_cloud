<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'zipcode',
        'prefecture',
        'city',
        'address',
        'gender',
        'birthday',
        'available_notification',
        'user_id'
    ];

    protected $table = 'profiles';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
