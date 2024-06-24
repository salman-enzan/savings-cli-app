<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'view:expense')]
class ViewExpenseCommand extends Command
{   

    protected function configure() : void
    {
        $this->setDescription('Shows every Expense');
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $data = FileOps::loadData('incomes.json');

        $output->writeln(" ");
        $output->writeln(" ");
        
        if (empty($data)) {
            $output->writeln('No Expense Found.');
        } else {
            foreach ($data as $d) {
                $output->writeln('Expense: ' . $d['expense'] . ', Category: ' . $d['category']);
            }
        }
        $output->writeln(" ");
        $output->writeln(" ");

        return Command::SUCCESS;
    }
}
