<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
    ];

    // Replace route token {product} с id на slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The users that belong to the product.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
