<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'price',
        'discountable',
        'downloadable',
        'promoted',
        'sale',
        'start_sale',
        'end_sale',
        'discount_percent',
        'quantity'
    ];

    public static $rules = [
        'image' => 'sometimes',
        'file' => 'sometimes',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'discountable' => 'nullable',
        'downloadable' => 'nullable',
        'promoted' => 'nullable',
        'sale' => 'nullable',
        'start_sale' => 'nullable',
        'end_sale' => 'nullable',
        'discount_percent' => 'nullable',
        'quantity' => 'required|integer',
    ];
    protected $appends =['image_url', 'file_url', 'discounted_price'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user');
    }

    public function getImageUrlAttribute()
    {
        return $this->hasMedia('product_images') ? $this->getFirstMediaUrl('product_images') : asset('/uploads/pet_default.jpg');
    }
    public function getFileUrlAttribute()
    {
        return $this->hasMedia('product_file') ? $this->getFirstMediaUrl('product_file') : asset('/uploads/pet_default.jpg');
    }
    public function getDiscountedPriceAttribute()
    {
        return  ($this->price * (100 -$this->discount_percent))/100;
    }
}
