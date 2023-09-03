<?php

namespace App\Observer;

class User
{
    private array $attributes;

    public function __construct(array $data)
    {
        $this->attributes = [...$data];
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function update(array $data)
    {
        $this->attributes = array_merge($this->attributes, $data);
    }
}