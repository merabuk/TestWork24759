<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Get the user associated with the api_token.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
