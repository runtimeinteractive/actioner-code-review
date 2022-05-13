<?php

namespace Sav\Actioner\App\Classes\Outputs;

use Sav\Actioner\App\Interfaces\OutputInterface;

class StringOutput implements OutputInterface
{
    public function __construct(protected string $value)
    {
    }

    public function getOutput(): array
    {
        return ['value' => $this->value];
    }
}