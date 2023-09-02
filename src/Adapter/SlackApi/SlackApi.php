<?php

namespace App\Adapter\SlackApi;

/**
 * The Adaptee contains some useful behavior, but its interface is incompatible
 * with the existing client code. The Adaptee needs some adaptation before the
 * client code can use it.
 * For example this class can be a third-party library that you can't change.
 */
class SlackApi implements SlackApiInterface {
    public function __construct(private string $apiKey)
    {
    }

    public function sendMessage(string $channel, string $message): void
    {
        // Send Slack notification
        echo sprintf("Slack notification sent to channel '%s' with message '%s'", $channel, $message) . PHP_EOL;
    }
}