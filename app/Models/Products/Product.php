<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images\Image;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title' ,'price','description','image_id'];

    
    /**
     * image
     *
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(image::class, 'id', 'image_id');
    }
}
