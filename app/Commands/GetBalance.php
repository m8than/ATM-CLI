<?php

namespace App\Commands;

use App\Models\Account;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class GetBalance extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'atm:balance
                            {account-number : The number of the account}
                            {account-pin : The accounts pin number}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Gets account balance';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $account_number = $this->argument('account-number');
        $account_pin = $this->argument('account-pin');

        $account = Account::find($account_number);

        if ($account && $account->pin == $account_pin) {
            $this->info('Balance: ' . $account->balance);
            $this->info('Available: ' . $account->available);
        } else {
            $this->error('Invalid account number or pin');
        }
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
