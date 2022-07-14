<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory , SoftDeletes , Sluggable;

    protected $fillable = [
        'name' ,
        'description' ,
        'slug' ,
        'image' ,
        'status' ,
        'tags' ,
    ];

    public function sluggable ()
    : array
    {
        return [
            'slug' => [
                'source' => 'name' ,
            ] ,
        ];
    }

    protected $casts = [ 'image' => 'array' ];
}
