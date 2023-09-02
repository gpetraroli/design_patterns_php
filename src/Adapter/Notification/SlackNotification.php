<?php

namespace App\Adapter\Notification;

use App\Adapter\SlackApi\SlackApiInterface;

class SlackNotification implements NotificationInterface
{
    public function __construct(private SlackApiInterface $slackApi, private string $slackChannel)
    {
    }

    public function send(string $title, string $message): void
    {
        $adaptedMessage = sprintf("%s - %s", $title, $message);
        $this->slackApi->sendMessage($this->slackChannel, $adaptedMessage);
    }
}