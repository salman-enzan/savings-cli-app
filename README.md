# Savings CLI Application

This is a simple CLI application for adding income, adding expenses, viewing income/expense list, viewing income/expense categories, and viewing savings(total income - total expense).
There is a Category for each income and expense.When the script runs, the user will see a list of options like the following:   

    1. Add income
    2. Add expense
    3. View incomes
    4. View expenses
    5. View savings
    6. View categories
   
    Enter your option:

## Requirements

- PHP (version 7.4 or later)
- Composer
- Symphony console Component

## Installation

1. Clone the repository to your local machine:
   ```sh
   git clone https://github.com/salman-enzan/savings-cli-app.git
   cd savings-cli-ap
   composer install
   composer require symfony/console
   php app.php
