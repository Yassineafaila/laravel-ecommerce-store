<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    // protected $primaryKey = null; // No primary key
    protected $primaryKey = 'user_id';
    public $incrementing = false; // Don't automatically increment a primary key
    protected $keyType = null; // No primary key type
    protected $fillable = ["user_id", "product_id", "Quantity"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
