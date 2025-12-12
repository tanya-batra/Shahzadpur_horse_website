<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorseDetail extends Model
{
    use HasFactory;

    protected $fillable = ['subcategory_id', 'description' , 'horse_name', 'color', 'age', 'height' , 'status'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function images()
    {
        return $this->hasMany(HorseImage::class);
    }
}
