<?php

namespace Sav\Actioner\App\Classes\Actions;

use Sav\Actioner\App\Classes\Outputs\ArrayOutput;
use Sav\Actioner\App\Interfaces\InputInterface;
use Sav\Actioner\App\Interfaces\OutputInterface;
use Sav\Actioner\App\Interfaces\ParamsInterface;

class MakeGetRequestAction extends Action implements InputInterface, ParamsInterface
{
    protected array $input;
    protected array $params;

    public function execute(): OutputInterface
    {
        $response = (new \GuzzleHttp\Client())->get($this->input['value'], $this->params)->getBody()->getContents();
        return new ArrayOutput($response);
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