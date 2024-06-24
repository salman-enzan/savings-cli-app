<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'view:category')]
class ViewCategoryCommand extends Command
{   

    protected function configure() : void
    {
        $this->setDescription('Shows every Category');
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $data = FileOps::loadData('incomes.json');

        $output->writeln(" ");
        $output->writeln(" ");
        
        if (empty($data)) {
            $output->writeln('No Category Found.');
        } else {
            foreach ($data as $d) {
                $output->writeln('Category: ' . $d['category']);
            }
        }
        $output->writeln(" ");
        $output->writeln(" ");

        return Command::SUCCESS;
    }
}
