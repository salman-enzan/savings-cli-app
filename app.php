#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use App\Command\Menus;
use App\Command\AddIncomeCommand;
use App\Command\AddExpenseCommand;
use App\Command\ViewIncomeCommand;
use App\Command\ViewExpenseCommand;
use App\Command\ViewSavingsCommand;
use App\Command\ViewCategoryCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\ConsoleOutput;

$application = new Application();


// ... register commands
$application->add(new AddIncomeCommand());
$application->add(new ViewIncomeCommand());
$application->add(new AddExpenseCommand());
$application->add(new ViewExpenseCommand());
$application->add(new ViewCategoryCommand());
$application->add(new ViewSavingsCommand());

$output = new ConsoleOutput();
$menu = new Menus($application,$output);

while(true){
    $menu->displayMenu();
    $input = readline("Choose Option : ");
    $menu->handleOption((int)$input);
}

$application->run();