<?php

namespace App\Composite;

class P extends HTMLComposite
{
    public function __construct($attributes = [])
    {
        parent::__construct('p', $attributes);
    }
}