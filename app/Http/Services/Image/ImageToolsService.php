<?php

namespace App\Http\Services\Image;

class ImageToolsService
{
    protected $image;
    protected $exclusiveDirectory;
    protected $imageDirectory;
    protected $imageName;
    protected $imageFormat;
    protected $finalImageDirectory;
    protected $fianlImageName;


    public function setImage ( $image )
    {
        $this->image = $image;
    }


    public function getExclusiveDirectory ()
    {
        return $this->exclusiveDirectory;
    }


    public function setExclusiveDirectory ( $exclusiveDirectory )
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory , '/\\');
    }


    public function getImageDirectory ()
    {
        return $this->imageDirectory;
    }


    public function setImageDirectory ( $imageDirectory )
    {
        $this->imageDirectory = trim($imageDirectory , '/\\');
    }


    public function getImageName ()
    {
        return $this->imageName;
    }


    public function setImageName ( $imageName )
    {
        $this->imageName = $imageName;
    }

    public function setCurrentImageName ()
    {
        return !empty($this->image) ? $this->setImageName(pathinfo($this->image->getClientOriginalName() , PATHINFO_FILENAME)) : FALSE;
    }


    public function getImageFormat ()
    {
        return $this->imageFormat;
    }


    public function setImageFormat ( $imageFormat )
    {
        $this->imageFormat = $imageFormat;
    }


    public function getFinalImageDirectory ()
    {
        return $this->finalImageDirectory;
    }

    public function setFinalImageDirectory ( $finalImageDirectory )
    {
        $this->finalImageDirectory = $finalImageDirectory;
    }


    public function getFianlImageName ()
    {
        return $this->fianlImageName;
    }

    public function setFinalImageName ( $fianlImageName )
    {
        $this->fianlImageName = $fianlImageName;
    }

    protected function checkDirectory ( $imageDirectory )
    {
        if ( !file_exists($imageDirectory) )
        {
            mkdir($imageDirectory , 0755 , TRUE);
        }
    }

    protected function getImageAddress ()
    {
        return $this->finalImageDirectory . DIRECTORY_SEPARATOR . $this->fianlImageName;
    }

    protected function provider ()
    {
        // Set Propertiess
        $this->getImageDirectory() ?? $this->setImageDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->getImageName() ?? $this->setImageName(time());
        $this->getImageFormat() ?? $this->setImageFormat($this->image->extension());

        // Set Final Image Directory
        $finalImageDirectory = empty($this->getExclusiveDirectory()) ? $this->imageDirectory : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getImageDirectory();
        $this->setFinalImageDirectory($finalImageDirectory);

        // Set Final Image Name
        $this->setFinalImageName($this->getImageName() . '.' . $this->getImageFormat());

        // Check And Craete Final Image Directory
        $this->checkDirectory($this->getFinalImageDirectory());
    }


}
