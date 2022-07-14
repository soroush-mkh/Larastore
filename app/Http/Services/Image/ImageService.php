<?php

namespace App\Http\Services\Image;

use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

class ImageService extends ImageToolsService
{
    public function save ( $image )
    {
        // Set Image
        $this->setImage($image);

        // Execute Provider
        $this->provider();

        // Save Image
        $result = Image::make($image->getRealPath())->save(public_path($this->getImageAddress()) , NULL , $this->getImageFormat());
        return $result ? $this->getImageAddress() : FALSE;
    }

    public function fitAndSave ( $image , $width , $height )
    {
        // Set Image
        $this->setImage($image);

        // Execute Provider
        $this->provider();

        // Save Image
        $result = Image::make($image->getRealPath())->fit($width , $height)->save(public_path($this->getImageAddress()) , NULL , $this->getImageFormat());
        return $result ? $this->getImageAddress() : FALSE;
    }

    public function createIndexAndSave ( $image )
    {

        // Get Data From Config
        $imageSizes = Config::get('image.index-image-sizes');

        // Set Image
        $this->setImage($image);

        // Set Directory
        $this->getImageDirectory() ?? $this->setImageDirectory(date('Y') . DIRECTORY_SEPARATOR . date("m") . DIRECTORY_SEPARATOR . date('d'));
        $this->setImageDirectory($this->getImageDirectory() . DIRECTORY_SEPARATOR . time());

        // Set Name
        $this->getImageName() ?? $this->setImageName(time());
        $imageName = $this->getImageName();

        $indexArray = [];
        foreach ( $imageSizes as $sizeAlias => $imageSize )
        {
            // Create And Save This Size Name
            $currentImageName = $imageName . '_' . $sizeAlias;
            $this->setImageName($currentImageName);

            // Execute Provider
            $this->provider();

            // Save Image
            $result = Image::make($image->getRealPath())->fit($imageSize[ 'width' ] , $imageSize[ 'height' ])->save(public_path($this->getImageAddress()) , NULL , $this->getImageFormat());
            if ( $result )
                $indexArray[ $sizeAlias ] = $this->getImageAddress();
            else
                return FALSE;
        }

        $images[ 'indexArray' ]   = $indexArray;
        $images[ 'directory' ]    = $this->getFinalImageDirectory();
        $images[ 'currentImage' ] = Config::get('image.default-current-index-image');

        return $images;
    }

    public function deleteImage ( $imagePath )
    {
        if ( file_exists($imagePath) )
        {
            unlink($imagePath);
        }
    }

    public function delteIndex ( $images )
    {
        $directory = public_path($images[ 'directory' ]);
        $this->deleteDirectoryAndFiles($directory);
    }

    public function deleteDirectoryAndFiles ( $directory )
    {
        if ( !is_dir($directory) )
        {
            return FALSE;
        }

        $files = glob($directory . DIRECTORY_SEPARATOR . '*' , GLOB_MARK);
        foreach ( $files as $file )
        {
            if ( is_dir($file) )
            {
                $this->deleteDirectoryAndFiles($file);
            }
            else
            {
                unlink($file);
            }
        }
        $result = rmdir($directory);
        return $result;
    }

}
