<?php

namespace Sav\Actioner\App\Commands;

use Sav\Actioner\App\Enums\InputTypes;
use Sav\Actioner\App\Interfaces\ParamsInterface;
use Sav\Actioner\App\Interfaces\InputInterface as ActionInputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExecuteInstructions extends Command
{
    protected function configure()
    {
        $this->setName('execute')
            ->setDescription("Executes a set of instructions and outputs the result")
            ->addArgument('filename', InputArgument::REQUIRED, "The filename containing the instructions you'd like to execute (file must be in root of instructions folder)");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $instructions = include sprintf("instructions/%s", $filename = $input->getArgument('filename'));

        $output->writeln(sprintf("Execution of %s started", $filename));

        $previousOutput = null;
        foreach ($instructions as $actionInstruction) {
            $action = new $actionInstruction['action']();

            if ($action instanceof ActionInputInterface) {
                $input = match ($actionInstruction['input']['type']) {
                    InputTypes::INHERIT => $previousOutput,
                    InputTypes::DIRECT => ['value' => $actionInstruction['input']['value']],
                    default => throw new \Exception("Unknown input type")
                };

                $action->setInput($input);
            }

            if ($action instanceof ParamsInterface) {
                $action->setParams($actionInstruction['params']);
            }

            $previousOutput = $action->execute()->getOutput();
        }

        $output->writeln("Execution complete");

        return self::SUCCESS;
    }
}