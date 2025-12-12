<?php

namespace App\Models;

use App\Models\HorseDetail;
use App\Models\listingCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
     use HasFactory;

    protected $table = 'subcategories';
    protected $fillable = ['category_id', 'name', 'image', 'short_description','status'];

    public function category()
    {
        return $this->belongsTo(listingCategory::class, 'category_id');
    }
public function horses() {
    return $this->hasMany(HorseDetail::class, 'subcategory_id');
}

}