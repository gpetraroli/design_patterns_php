<?php

use App\Observer\Logger;
use App\Observer\OnboardingNotifier;
use App\Observer\User;
use App\Observer\UserRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$logger = new Logger();
$onboardingNotifier = new OnboardingNotifier();

$repository = new UserRepository();

// Attach the logger to the "all" event group
$repository->attach($logger, UserRepository::EVENT_GROUPS['all']);

// Attach the onboarding notifier to the "created" event group
$repository->attach($onboardingNotifier, UserRepository::EVENT_GROUPS['created']);

$repository->initialize('');

$newUser = $repository->createUser(['name' => 'John Doe', 'email' => 'dummy@test.com']);

$repository->updateUser($newUser, ['name' => 'Jane Doe']);

$repository->deleteUser($newUser);
