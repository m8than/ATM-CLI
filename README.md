# ATM-CLI

A demonstration CLI application, written in PHP 7.3+ using framework [Laravel Zero](https://laravel-zero.com/).


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