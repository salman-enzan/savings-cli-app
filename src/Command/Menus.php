<?php

namespace App\Command;


use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;


class Menus{
    private $application;
    private $output;

    public function __construct(Application $application, OutputInterface $output)
    {
        $this->application = $application;
        $this->output = $output;
    }

    public function displayMenu()
    {
        $this->output->writeln("1. Add income");
        $this->output->writeln("2. Add expense");
        $this->output->writeln("3. View incomes");
        $this->output->writeln("4. View expenses");
        $this->output->writeln("5. View savings");
        $this->output->writeln("6. View categories");
        $this->output->writeln("7. Exit");
    }

    public function handleOption($option)
    {
        switch ($option) {
            case 1:
                $this->runCommand('add:income');
                break;
            case 2:
                $this->runCommand('add:expense');
                break;
            case 3:
                $this->runCommand('view:income');
                break;
            case 4:
                $this->runCommand('view:expense');
                break;
            case 5:
                $this->runCommand('view:savings');
                break;
            case 6:
                $this->runCommand('view:category');
                break;
            case 7:
                exit(0);
            default:
                $this->output->writeln("Invalid option. Please try again.");
        }
    }

    public function runCommand($commandName)
    {
        $command = $this->application->find($commandName);
        $input = new ArrayInput([]);
        $command->run($input, $this->output);
    }

}

?>