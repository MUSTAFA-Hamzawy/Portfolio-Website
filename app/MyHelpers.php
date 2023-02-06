<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class MyHelpers
{

    /**
     * @param string $originalName
     * @return string
     */
    public static function encryptFileName(string $originalName): string{
        return substr(md5(time() . $originalName), 0, 80);
    }

    /**
     * @param UploadedFile $file
     * @param string $path
     * @return void
     */
    public static function uploadFile(UploadedFile $file, string $path){
        // encrypt the file name
        $extension = $file->getClientOriginalExtension();
        $encryptedName = self::encryptFileName($file->getClientOriginalName() . time());
        $fileName = $encryptedName . '.' . $extension;
        $file->move($path, $fileName);
        return $fileName;
    }
}
