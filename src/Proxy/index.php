<?php

use App\Proxy\Downloader;
use App\Proxy\DownloaderProxy;

require_once __DIR__ . '/../../vendor/autoload.php';;

$url = 'https://refactoring.guru/design-patterns/proxy';

$downloader = new Downloader();
$downloaderProxy = new DownloaderProxy($downloader);

// calculate time to download the same url twice
$t0 = microtime(true);
$downloaderProxy->download($url) . PHP_EOL;
$t1 = microtime(true);

$t2 = microtime(true);
$downloaderProxy->download($url) . PHP_EOL;
$t3 = microtime(true);

$timeFirstRequest = $t1 - $t0;
$timeSecondRequest = $t3 - $t2;

echo "Time to download the same url twice: " . PHP_EOL;
echo "First request: " . $timeFirstRequest . PHP_EOL;
echo "Second request: " . $timeSecondRequest . PHP_EOL;
echo "Difference: " . ($timeSecondRequest - $timeFirstRequest) . PHP_EOL;
