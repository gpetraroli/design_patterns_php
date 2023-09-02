<?php

use App\Adapter\Notification\EmailNotification;
use App\Adapter\Notification\NotificationInterface;
use App\Adapter\Notification\SlackNotification;
use App\Adapter\SlackApi\SlackApi;

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * This method represents your client code.
 * Note that the client code works with any concrete notification classes that follow the target interface.
 */
function handleNotification(NotificationInterface $notification): void
{
    $notification->send('Title', 'Message');
}

$emailNotification = new EmailNotification('dummy@test.com');
handleNotification($emailNotification);

// Let's say that at one point you decide to add Slack notifications.
// We don't want to change the client code! We can create a new class that implements the target interface.
$slackNotification = new SlackNotification(new SlackApi('dummy-api-key'), 'dummy-channel');
handleNotification($slackNotification);