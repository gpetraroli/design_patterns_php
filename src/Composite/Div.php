<?php

namespace App\Composite;

class Div extends HTMLComposite
{
    public function __construct($attributes = [])
    {
        parent::__construct('div', $attributes);
    }
}