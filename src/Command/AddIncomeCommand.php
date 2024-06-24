<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'add:income')]
class AddIncomeCommand extends Command
{   
    protected function configure() : void
    {
        $this->setDescription('Add an income');
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $amount = readline("Enter Amount : ");
        $category = readline("Enter Category : ");
        $category = strtolower($category);

        $data = FileOps::loadData('incomes.json');

        if (FileOps::cateogoryExist($data, $category)) {
            $prevAmount = FileOps::getAmount($data, $category);
            $total = floatval($prevAmount) + floatval($amount);

            FileOps::addAmount($data, $category, $total);      
        } else {
            $data[] = ['amount' => $amount, 'category' => $category];
        }

        try {
            FileOps::saveData('incomes.json', $data);
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }

        $output->writeln("\nIncome added successfully.\n");

        return Command::SUCCESS;
    }
}
