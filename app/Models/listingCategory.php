<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class listingCategory extends Model
{
   use HasFactory;

    protected $table = 'listingcategories';
    protected $fillable = ['name', 'image', 'short_description', 'status'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}
