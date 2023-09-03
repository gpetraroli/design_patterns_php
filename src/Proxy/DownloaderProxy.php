<?php

namespace App\Proxy;

use App\Proxy\DownloaderInterface;

class DownloaderProxy implements DownloaderInterface
{
    private array $cache = [];

    public function __construct(private Downloader $downloader)
    {
    }

    public function download(string $url): string
    {
        if (!isset($this->cache[$url])) {
            $this->cache[$url] = $this->downloader->download($url);
        }

        return $this->cache[$url];
    }
}