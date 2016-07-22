<?php

namespace App\Fondation;

/**
 * Created by PhpStorm.
 * User: mfrancois
 * Date: 22/07/2016
 * Time: 10:26
 */
class Application extends \Illuminate\Foundation\Application
{

    public function storagePath()
    {
        $path = env('STORAGE_PATH', $this->basePath . DIRECTORY_SEPARATOR . 'storage');

        return $this->storagePath ?: $path;
    }

    public function abort($code, $message = '', array $headers = [])
    {
        if ($code == 500 && $this->environment() != 'dev') {
            $code = 404;
        }
        parent::abort($code, $message, $headers);
    }

}