# ATM-CLI

A demonstration CLI application, written in PHP 7.3+ using framework [Laravel Zero](https://laravel-zero.com/).

After rereading the task document a bunch of times I realise I must have really overengineered this task.

It's overengineered in a way that made the test input confusing to me.
It was confusing as I thought half of the input data was actually stuff I was meant to output but there was output and input on the same line.

I now realise I was just meant to write a file parser to read through every line and not create a full system with a database. Oops

## Installation

1. Git clone this repository
2. Copy .env.example to .env and fill in database credentials
3. Run 'php atm-cli migrate' to setup the database
4. [OPTIONAL] Run 'php atm-cli db:seed' to populate the database with test data

## Commands

### php atm-cli atm:balance {account number} {account pin}
returns the accounts balance

### php atm-cli atm:withdraw {account number} {account pin} {amount}
attempts to withdraw money from an account

### php atm-cli atm:withdrawals {account number} {account pin}
returns the accounts withdrawal history

### php atm-cli atm:customers {account number} {account pin}
returns the names of the accounts owner/s
