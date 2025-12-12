<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      protected $fillable = ['name', 'thumbnail'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }


    public function images()
{
    return $this->hasMany(Gallery::class, 'category_id');
}
public function subcategories() {
    return $this->hasMany(Subcategory::class);
}

}
