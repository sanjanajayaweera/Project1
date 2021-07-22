<?php

namespace App\Models\Tags;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images\Image;

use Illuminate\Database\Eloquent\Relations\HasOne;


class Tag extends Model
{
    use HasFactory;
     protected $fillable = ['title' ,'description','image_id'];

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
