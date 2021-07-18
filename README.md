# ATM-CLI

A demonstration CLI application, written in PHP 7.3+ using framework [Laravel Zero](https://laravel-zero.com/).

To be honest I was not sure how to go about the test input data and output asked for.

It was confusing as I thought half of the input data was actually stuff I was meant to output but there was output and input on the same line.
 
For example: "The user's account number, correct PIN and the PIN they actually entered. These are
separated by spaces".

Anyways, this system has commands for each different functionality asked for documented below.


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
