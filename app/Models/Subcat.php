<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'img', 'cat_id'];

    /**
     * Ensure the price is always cast to a float.
     */
    protected $casts = [
        'price' => 'float',
    ];
}
