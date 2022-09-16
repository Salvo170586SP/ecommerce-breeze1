<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome','description','image','brand_id'
    ];



        /**
     * Get the brand for the blog products.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
