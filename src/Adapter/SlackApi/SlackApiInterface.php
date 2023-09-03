<?php

namespace App\Adapter\SlackApi;

interface SlackApiInterface
{
    public function sendMessage(string $channel, string $message): void;
}
