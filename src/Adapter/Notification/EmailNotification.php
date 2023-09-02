<?php

namespace App\Adapter\Notification;

class EmailNotification implements NotificationInterface
{
    public function __construct(private string $destEmail)
    {
    }

    public function send(string $title, string $message): void
    {
        echo sprintf("Email sent to %s with title '%s' and message '%s'", $this->destEmail, $title, $message) . PHP_EOL;
    }
}