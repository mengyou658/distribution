<?php

class Attachment extends Eloquent {

    protected $table = 'attachment';

    protected $guarded = [
        'id',
    ];

    public static function boot() {
        parent::boot();
        
        static::creating(function($attachment) {

            $name = $attachment->name;

            $tempFilePath = public_path() . '/upload/temp/'. $name;
            $attachmentFolder = '/upload/attachment/' . date('Y/m/');
            $dstFolderPath = public_path() . $attachmentFolder;

            if(!File::exists($dstFolderPath)) {
                mkdir($dstFolderPath, 0777, true); // mkdir($path, $mode, $recursive);
            }

            $dstFilePath = $dstFolderPath . $attachment->name;
            File::move($tempFilePath, $dstFilePath);

            $attachment->uri = $attachmentFolder . $attachment->name;
        });

        static::deleting(function($attachment) {

            $filePath = public_path() . $attachment->uri;

            if(File::exists($filePath)) {
                File::delete($filePath);
            }

        });
    }



}