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
        'sku',
        'img_thumb',
        'price',
        'price_sale',
        'description',
        'quantity',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function variants() {
        return $this->hasMany(ProductVariant::class);
    }

    public function galleries() {
        return $this->hasMany(ProductGallery::class);
    }
}