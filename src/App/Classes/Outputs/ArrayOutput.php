<?php

namespace Sav\Actioner\App\Classes\Outputs;

use Sav\Actioner\App\Interfaces\OutputInterface;

class ArrayOutput implements OutputInterface
{
    public function __construct(protected string $value)
    {
    }

    public function getOutput(): array
    {
        return ['value' => json_decode($this->value, true)];
    }
}