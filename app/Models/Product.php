<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["name", "description", "rating", "price", "image", "numberOfLikes", "stockQuantity"];
    //this function is feltring the product :
    public function scopeFilter($query, array $filters)
    {
        // Filtering by category
        if ($filters["category"] ?? false) {
            $query->whereHas('categories', function ($query) {
                $query->where('name', 'like', '%' . request('category') . '%');
            });
        }

        // Filtering by search keyword
        if ($filters["search"] ?? false) {
            $search = request('search');
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('categories', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            });
        }
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_liked_product', 'product_id', 'user_id');
    }
}
