<?php

namespace App\Proxy;

use App\Proxy\DownloaderInterface;

class Downloader implements DownloaderInterface
{

    public function download(string $url): string
    {
        return file_get_contents($url);
    }
}