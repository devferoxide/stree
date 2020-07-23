<?php

return [
    'name' => 'StrEE',
    'version' => '1.0.0',
    'author'=> 'Devferoxide',
    'namespace' => 'Devferoxide\Stree',
    'author_url' => 'https://devferoxi.de/',
    'docs_url' => 'https://github.com/devferoxide/stree',
    'description' => 'Just another string manipulation add-on for ExpressionEngine.',
    'services' => [
        'Str' => function() {
          return new \Devferoxide\Stree\Service\Str();
        },
    ]
];