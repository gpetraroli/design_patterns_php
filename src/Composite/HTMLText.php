<?php

namespace App\Composite;

abstract class HTMLText implements HTMLInterface
{
    protected $name;
    protected $content;

    public function __construct(string $name, string $content)
    {
        $this->name = $name;
        $this->content = $content;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function render(): string
    {
        return "$this->content";
    }
}