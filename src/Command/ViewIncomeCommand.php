<?php

namespace App\Command;

use App\Command\FileOps;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'view:income')]
class ViewIncomeCommand extends Command
{
    protected function configure () : void
    {
        $this->setDescription('Add an income');
          
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $data = FileOps::loadData('incomes.json');

        $output->writeln(" ");
        $output->writeln(" ");


        if (empty($data)) {
            $output->writeln('No incomes found.');
        } else {
            foreach ($data as $income) {
                $output->writeln('Amount: ' . $income['amount'] . ', Category: ' . $income['category']);
            }
        }

        $output->writeln(" ");
        $output->writeln(" ");




        return Command::SUCCESS;

    }
}

?>