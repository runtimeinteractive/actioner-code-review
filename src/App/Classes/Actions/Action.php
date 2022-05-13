<?php

namespace Sav\Actioner\App\Classes\Actions;

use Sav\Actioner\App\Interfaces\OutputInterface;

abstract class Action
{
    public abstract function execute(): OutputInterface;
}