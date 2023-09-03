<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Composite\Div;
use App\Composite\P;
use App\Composite\Text;

$div = new Div([
    'class' => 'container',
    'id' => 'main'
]);

$p = new P([
    'class' => 'text',
    'id' => 'paragraph'
]);

$text = new Text('Hello World!');

$p->add($text);
$div->add($p);

echo $div->render();