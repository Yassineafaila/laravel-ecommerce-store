<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    use HasFactory;

    public function product(){
        $this->belongsTo(Product::class);
    }
    public function user(){
        
        return $this->belongsTo(User::class,"user_id","id");
    }
}
