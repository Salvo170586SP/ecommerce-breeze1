<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_brand'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
