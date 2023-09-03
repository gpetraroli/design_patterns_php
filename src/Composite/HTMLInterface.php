<?php

namespace App\Composite;

interface HTMLInterface
{
    public function getName(): string;
    public function render(): string;
}