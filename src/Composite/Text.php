<?php

namespace App\Composite;

class Text extends HTMLText
{
    public function __construct(string $content)
    {
        parent::__construct('text', $content);
    }
}