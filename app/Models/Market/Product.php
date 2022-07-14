<?php

namespace App\Models\Market;

use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes , Sluggable;

    protected $fillable = [
        'name' ,
        'introduction' ,
        'slug' ,
        'image' ,
        'status' ,
        'tags' ,
        'weight' ,
        'width' ,
        'length' ,
        'height' ,
        'price' ,
        'marketable' ,
        'brand_id' ,
        'sold_number' ,
        'frozen_number' ,
        'marketable_number' ,
        'category_id' ,
        'published_at' ,
    ];

    protected $casts = [ 'image' => 'array' ];

    public function sluggable ()
    : array
    {
        return [
            'slug' => [
                'source' => 'name' ,
            ] ,
        ];
    }

    public function category ()
    {
        return $this->belongsTo(ProductCategory::class , 'category_id');
    }

    public function brand ()
    {
        return $this->belongsTo(Brand::class , 'brand_id');
    }

    public function metas ()
    {
        return $this->hasMany(ProductMeta::class);
    }

    public function colors ()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function images ()
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments ()
    {
        return $this->morphMany('App\Models\Content\Comment' , 'commentable');
    }

    public function guarantees ()
    {
        return $this->hasMany(Guarantee::class);
    }

    public function amazingSales()
    {
        return $this->hasMany(AmazingSale::class);

    }

    public function activeAmazingSales()
    {
        return $this->amazingSales()->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first();
    }

    public function values ()
    {
        return $this->hasMany(CategoryValue::class);
    }

    public function activeComments ()
    {
        return $this->comments()->where('approved' , 1)->whereNull('parent_id')->get();
    }

    public function user ()
    {
        return $this->belongsToMany(User::class);
    }
}
