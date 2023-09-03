<?php

namespace App\Observer;

use Cassandra\Date;
use SplSubject;

class Logger implements \SplObserver
{
    public function update(SplSubject $subject, string $eventGroup = null, User $user = null): void
    {
        $entry = \date('Y-m-d H:i:s');

        if ($eventGroup === UserRepository::EVENT_GROUPS['init']) {
            $entry .= ' | User repository initialized';
        }

        if ($eventGroup === UserRepository::EVENT_GROUPS['created']) {
            $entry .= ' | User created: id -> ' . $user->getAttributes()['id'];
        }

        if ($eventGroup === UserRepository::EVENT_GROUPS['updated']) {
            $entry .= ' | User updated: id -> ' . $user->getAttributes()['id'];
        }

        if ($eventGroup === UserRepository::EVENT_GROUPS['deleted']) {
            $entry .= ' | User deleted: id -> ' . $user->getAttributes()['id'];
        }

        print_r($entry . PHP_EOL);
    }
}