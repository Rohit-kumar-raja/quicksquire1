<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function subcategory2()
    // {
    //     return $this->hasMany(Subcategory2::class, 'subcategory_id');
    // }
}
