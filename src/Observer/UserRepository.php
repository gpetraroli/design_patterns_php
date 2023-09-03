<?php

namespace App\Observer;

use SplObserver;

class UserRepository implements \SplSubject
{
    const EVENT_GROUPS = [
        'all' => 'user:*',
        'init' => 'user:init',
        'created' => 'user:created',
        'updated' => 'user:updated',
        'deleted' => 'user:deleted',
    ];
    private array $observers = [];
    private array $users = [];

    public function __construct()
    {
        // Initialize the observer with the special event group "all"
        $this->observers[self::EVENT_GROUPS['all']] = [];
    }

    // =======================================
    // Code related to the Observer design pattern

    private function initEventGroup(string $eventGroup = self::EVENT_GROUPS['all']): void
    {
        if (!isset($this->observers[$eventGroup])) {
            $this->observers[$eventGroup] = [];
        }
    }

    private function getEventObservers(string $eventGroup = self::EVENT_GROUPS['all']): array
    {
        $this->initEventGroup($eventGroup);
        $group = $this->observers[$eventGroup];
        $all = $this->observers[self::EVENT_GROUPS['all']];

        return array_merge($group, $all);
    }

    public function attach(SplObserver $observer, string $eventGroup = self::EVENT_GROUPS['all']): void
    {
        $this->initEventGroup($eventGroup);
        $this->observers[$eventGroup][] = $observer;
    }

    public function detach(SplObserver $observer, string $eventGroup = self::EVENT_GROUPS['all']): void
    {
        foreach ($this->getEventObservers($eventGroup) as $key => $o) {
            if ($o === $observer) {
                unset($this->observers[$eventGroup][$key]);
            }
        }
    }

    public function notify(string $eventGroup = self::EVENT_GROUPS['all'], $data = null): void
    {
        foreach ($this->getEventObservers($eventGroup) as $observer) {
            $observer->update($this, $eventGroup, $data);
        }
    }
    // =======================================

    // =======================================
    // Real BusinessLogic of the class

    public function initialize(string $filename): void
    {
        // loads users data from source (database, file, ...)
        // in this example we load users from file
        // TODO: load users

        $this->notify(self::EVENT_GROUPS['init']);
    }

    public function createUser(array $data): User
    {
        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user = new User([...$data, 'id' => $id]);
        $this->users[$id] = $user;

        $this->notify(self::EVENT_GROUPS['created'], $user);

        return $user;
    }

    public function updateUser(User $user, array $data): ?User
    {
        /** @var string $id */
        $id = $user->getAttributes()['id'];

        if (!isset($this->users[$id])) {
           return null;
        }

        $this->users[$id]->update($data);

        $this->notify(self::EVENT_GROUPS['updated'], $this->users[$id]);

        return $this->users[$id];
    }

    public function deleteUser(User $user): void
    {
        /** @var string $id */
        $id = $user->getAttributes()['id'];

        if (!isset($this->users[$id])) {
           return;
        }

        unset($this->users[$id]);

        $this->notify(self::EVENT_GROUPS['deleted'], $user);
    }
}