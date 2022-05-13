<?php

use Sav\Actioner\App\Classes\Actions\ArrayToJSONConversionAction;
use Sav\Actioner\App\Classes\Actions\MakeGetRequestAction;
use Sav\Actioner\App\Classes\Actions\PrintStringAction;
use Sav\Actioner\App\Classes\Actions\ReplaceStringAction;
use Sav\Actioner\App\Classes\Actions\TextInputAction;
use Sav\Actioner\App\Enums\InputTypes;

return [
    [
        'action' => TextInputAction::class,
        'params' => [],
        'input' => [
            'type' => InputTypes::DIRECT,
            'value' => "https://jsonplaceholder.typicode.com/todos/1"
        ]
    ],
    [
        'action' => ReplaceStringAction::class,
        'params' => [
            'pattern' => "/1/",
            'replacement' => "5"
        ],
        'input' => [
            'type' => InputTypes::INHERIT,
            'value' => null
        ]
    ],
    [
        'action' => MakeGetRequestAction::class,
        'params' => [],
        'input' => [
            'type' => InputTypes::INHERIT,
            'value' => null
        ]
    ],
    [
        'action' => ArrayToJSONConversionAction::class,
        'params' => [],
        'input' => [
            'type' => InputTypes::INHERIT,
            'value' => null
        ]
    ],
    [
        'action' => PrintStringAction::class,
        'params' => [],
        'input' => [
            'type' => InputTypes::INHERIT,
            'value' => null
        ]
    ]
];