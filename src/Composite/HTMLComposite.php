<?php

namespace App\Composite;

abstract class HTMLComposite implements HTMLInterface
{
    protected $name;
    protected $children = [];
    protected $attributes = [];

    public function __construct(string $name, array $attributes = [])
    {
        $this->name = $name;
        $this->attributes = $attributes;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function add(HTMLInterface $element)
    {
        $this->children[] = $element;
    }

    public function remove(HTMLInterface $element)
    {
        $key = array_search($element, $this->children, true);

        if ($key !== false) {
            unset($this->children[$key]);
        }
    }

    public function render(): string
    {
        $attr = '';
        foreach ($this->attributes as $key => $value) {
            $attr = $attr . " $key=\"$value\"";
        }

        $html = "<$this->name" . "$attr>\n";

        foreach ($this->children as $child) {
            $html = $html . $child->render() . "\n";
        }

        $html = $html . "</$this->name>";

        return $html;
    }
}