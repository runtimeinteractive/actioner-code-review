<?php

namespace Sav\Actioner\App\Classes\Actions;

use Sav\Actioner\App\Classes\Outputs\StringOutput;
use Sav\Actioner\App\Interfaces\InputInterface;
use Sav\Actioner\App\Interfaces\OutputInterface;

class TextInputAction extends Action implements InputInterface
{
    protected array $input;

    public function execute(): OutputInterface
    {
        return new StringOutput(
            $this->input['value']
        );
    }

    public function setInput(array $input): void
    {
        $this->input = $input;
    }
}