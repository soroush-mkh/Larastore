<?php

namespace App\Http\Services\Files;


class FileService extends FileToolsService
{
    public function moveToPublic ( $file )
    {
        // Set File
        $this->setFile($file);

        // Execute Provider
        $this->provider();

        // Save File
        $result = $file->move(public_path($this->getFinalFileDirectory()) , $this->getFinalFileName());
        return $result ? $this->getFileAddress() : FALSE;
    }

    public function moveToStorage ( $file )
    {
        // Set File
        $this->setFile($file);

        // Execute Provider
        $this->provider();

        // Save File
        $result = $file->move(storage_path($this->getFinalFileDirectory()) , $this->getFinalFileName());
        return $result ? $this->getFileAddress() : FALSE;
    }


    public function deleteFile ( $filePath , $storage = FALSE )
    {
        if ( $storage )
        {
            unlink(storage_path($filePath));
            return TRUE;
        }

        if ( file_exists($filePath) )
        {
            unlink($filePath);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}
