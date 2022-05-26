<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCoupon extends Model
{
    use HasFactory;

    protected $table = "home_coupons";

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
