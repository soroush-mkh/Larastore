<?php

namespace App\Http\Services\Files;

class FileToolsService
{
    protected $file;
    protected $exclusiveDirectory;
    protected $fileDirectory;
    protected $fileName;
    protected $fileFormat;
    protected $finalFileDirectory;
    protected $fianlFileName;
    protected $fileSize;


    public function setFile ( $file )
    {
        $this->file = $file;
    }


    public function getExclusiveDirectory ()
    {
        return $this->exclusiveDirectory;
    }


    public function setExclusiveDirectory ( $exclusiveDirectory )
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory , '/\\');
    }


    public function getFileDirectory ()
    {
        return $this->fileDirectory;
    }


    public function setFileDirectory ( $fileDirectory )
    {
        $this->fileDirectory = trim($fileDirectory , '/\\');
    }


    public function getFileName ()
    {
        return $this->fileName;
    }


    public function setFileName ( $fileName )
    {
        $this->fileName = $fileName;
    }

    public function setCurrentFileName ()
    {
        return !empty($this->file) ? $this->setFileName(pathinfo($this->file->getClientOriginalName() , PATHINFO_FILENAME)) : FALSE;
    }


    public function getFileFormat ()
    {
        return $this->fileFormat;
    }


    public function setFileFormat ( $fileFormat )
    {
        $this->fileFormat = $fileFormat;
    }


    public function getFinalFileDirectory ()
    {
        return $this->finalFileDirectory;
    }

    public function setFinalFileDirectory ( $finalFileDirectory )
    {
        $this->finalFileDirectory = $finalFileDirectory;
    }


    public function getFinalFileName ()
    {
        return $this->fianlFileName;
    }

    public function setFinalFileName ( $fianlFileName )
    {
        $this->fianlFileName = $fianlFileName;
    }

    protected function checkDirectory ( $fileDirectory )
    {
        if ( !file_exists($fileDirectory) )
        {
            mkdir($fileDirectory , 0755 , TRUE);
        }
    }


    public function getFileSize ()
    {
        return $this->fileSize;
    }


    public function setFileSize ( $file )
    {
        $this->fileSize = $file->getSize();
    }


    protected function getFileAddress ()
    {
        return $this->finalFileDirectory . DIRECTORY_SEPARATOR . $this->fianlFileName;
    }

    protected function provider ()
    {
        // Set Propertiess
        $this->getFileDirectory() ?? $this->setFileDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->getFileName() ?? $this->setFileName(time());
        $this->setFileFormat(pathinfo($this->file->getClientOriginalName() , PATHINFO_EXTENSION));

        // Set Final File Directory
        $finalFileDirectory = empty($this->getExclusiveDirectory()) ? $this->fileDirectory : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getFileDirectory();
        $this->setFinalFileDirectory($finalFileDirectory);

        // Set Final File Name
        $this->setFinalFileName($this->getFileName() . '.' . $this->getFileFormat());

        // Check And Craete Final File Directory
        $this->checkDirectory($this->getFinalFileDirectory());
    }


}
