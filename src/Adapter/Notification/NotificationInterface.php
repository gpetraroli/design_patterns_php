<?php

namespace App\Adapter\Notification;

/**
 * The target interface represents the interface that your code already knows.
 */
interface NotificationInterface
{
    public function send(string $title, string $message): void;
}
