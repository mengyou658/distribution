<?php

class MuninController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Munin Controller
    |--------------------------------------------------------------------------
    |
    */

    public static $mimeTypes = [
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
    ];

    public function __construct(){
        $this->beforeFilter('auth', ['only' => [
            'getUri',
        ]]);
    }

    public function getMimeTypeByPath($path) {
        $fileInfo = pathinfo($path);
        return self::$mimeTypes[$fileInfo['extension']];
    }

    public function getUri($uri = '') {
        if (!$uri) {
            return Redirect::to('munin/index.html');
        }

        $filePath = $_ENV['munin_www_path'].$uri;
        $mimeType = $this->getMimeTypeByPath($filePath);

        $response = Response::make(File::get($filePath), 200);
        $response->header('Content-Type', $mimeType);
        return $response;
    }

}
