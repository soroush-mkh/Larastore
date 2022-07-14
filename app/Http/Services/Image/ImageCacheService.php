<?php

namespace App\Http\Services\Image;

use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\fileExists;

class ImageCacheService
{
    public function cache ( $imagePath , $size = '' )
    {
        // Set Image Size
        $imageSizes = Config::get('image.cache-image-sizes');
        if ( !isset($imageSizes[ $size ]) )
        {
            $size = Config::get('image.default-current-cahce-image');
        }
        $width  = $imageSizes[ $size ][ 'width' ];
        $height = $imageSizes[ $size ][ 'height' ];


        // Cache Image
        if ( fileExists($imagePath) )
        {
            $img = Image::cache(function ( $image ) use ( $imagePath , $width , $height )
            {
                return $image->make($imagePath)->fit($width , $height);
            } , Config::get('image.cache-life-time') , TRUE);
            return $img->response();
        }
        else
        {
            $img = Image::canvas($width , $height , '#cdcdcd')->text('image not found - 404' , $width / 2 , $height / 2 , function ( $font )
            {
                $font->color('#333333');
                $font->align('center');
                $font->valign('center');
                $font->file(public_path('admin-assets/fonts/IRANSans/IRANSansWeb.woff'));
                $font->size(24);
            });
            return $img->response();
        }
    }
}
