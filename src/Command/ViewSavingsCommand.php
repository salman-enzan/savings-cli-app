<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'view:savings')]
class ViewSavingsCommand extends Command
{   

    protected function configure() : void
    {
        $this->setDescription('Shows Savings');
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {

        $data = FileOps::loadData('incomes.json');

        $income = 0;
        $expense = 0;
        $savings = 0;

        foreach ($data as $d){
            if(isset($d['amount'])){
                $income += $d['amount'];
            }
            if(isset($d['expense'])){
                $expense += $d['expense'];
            }
        }
        
        $savings = $income - $savings;

        if($savings < 0){

            $output->writeln(" ");
            $output->writeln(" ");

            $output->writeln('You Dont have any Savings. You have Minus amount');

            $output->writeln(" ");
            $output->writeln(" ");

        }else{

            $output->writeln(" ");
            $output->writeln(" ");

            $output->writeln('Total savings is : ' . $savings);

            $output->writeln(" ");
            $output->writeln(" ");

        }

        return Command::SUCCESS;
       
          
    }
}
