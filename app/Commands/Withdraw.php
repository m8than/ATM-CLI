<?php

namespace App\Commands;

use App\Models\Account;
use App\Models\AtmTransaction;
use App\Models\Datastore;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Withdraw extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'atm:withdraw
                            {account-number : The number of the account}
                            {account-pin : The accounts pin number}
                            {amount : The amount to withdraw}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Withdraws money from the atm';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $account_number = $this->argument('account-number');
        $account_pin = $this->argument('account-pin');
        $amount = $this->argument('amount');

        $account = Account::find($account_number);
        $atm_funds = Datastore::find('funds_available');

        if (!$account || $account->pin != $account_pin) {
            $this->error('ACCOUNT_ERR');
            return;
        }

        if ($atm_funds->value < $amount) {
            $this->error('ATM_ERR');
        }

        if ($account->withdraw($amount)){
            $this->info("Successfully withdrawn {$amount} from account {$account->id}");
        } else {
            $this->error('FUNDS_ERR');
        }
        
        $atm_funds->value -= $amount;
        $atm_funds->save();

        $transaction = new AtmTransaction;
        $transaction->account_id = $account->id;
        $transaction->amount = -$amount;
        $transaction->save();
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
