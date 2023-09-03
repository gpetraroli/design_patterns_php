<?php

namespace App\Proxy;

interface DownloaderInterface
{
    public function download(string $url): string;
}
