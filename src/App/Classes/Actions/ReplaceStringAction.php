<?php

namespace Sav\Actioner\App\Classes\Actions;

use Sav\Actioner\App\Classes\Outputs\StringOutput;
use Sav\Actioner\App\Interfaces\InputInterface;
use Sav\Actioner\App\Interfaces\OutputInterface;
use Sav\Actioner\App\Interfaces\ParamsInterface;

class ReplaceStringAction extends Action implements InputInterface, ParamsInterface
{
    protected array $params;
    protected array $input;

    public function execute(): OutputInterface
    {
        return new StringOutput(
            preg_replace($this->params['pattern'], $this->params['replacement'], $this->input['value'])
        );
    }

    public function setInput(array $input): void
    {
        $this->input = $input;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}