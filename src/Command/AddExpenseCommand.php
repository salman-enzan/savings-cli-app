<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'add:expense')]
class AddExpenseCommand extends Command
{   

    protected function configure() : void
    {
        $this->setDescription('Add an Expense');
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $expense = readline("Enter Expense Amount : ");
        $category = readline("Enter Category : ");
        $category = strtolower($category);

        $data = FileOps::loadData('incomes.json');

        $categoryFound = false;

        foreach ($data as &$d) {
            if ($d['category'] === $category) {
                $d['expense'] = $expense;
                $categoryFound = true;
                break; 
            }
        }

        if (!$categoryFound) {
            $output->writeln("\n Category Not Found \n");
        } else {
            try {
                FileOps::saveData('incomes.json', $data);

                $output->writeln(" ");
                $output->writeln(" ");


                $output->writeln("\n Expense added successfully. \n");

                $output->writeln(" ");
                $output->writeln(" ");


            } catch (\Exception $e) {
                $output->writeln($e->getMessage());
            }
        }

        return Command::SUCCESS;
    }
}
