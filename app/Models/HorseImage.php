<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorseImage extends Model
{
    use HasFactory;

    protected $fillable = ['horse_detail_id', 'image_path','status'];

    public function horseDetail()
    {
        return $this->belongsTo(HorseDetail::class);
    }
}
