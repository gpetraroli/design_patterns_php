<?php

namespace App\Observer;

use SplSubject;

class OnboardingNotifier implements \SplObserver
{

    public function update(SplSubject $subject, $eventGroup = null, $data = null): void
    {
        // Send an email to the user...

        print_r('Onboarding notification for user with id ' . $data->getAttributes()['id'] . PHP_EOL);
    }
}