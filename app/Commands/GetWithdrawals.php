<?php

namespace App\Commands;

use App\Models\Account;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class GetWithdrawals extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'atm:withdrawals
                            {account-number : The number of the account}
                            {account-pin : The accounts pin number}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Gets account withdrawals';

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
            $atm_transactions = $account->atm_transactions;
            $this->info('Transactions:');
            foreach ($atm_transactions as $atm_transaction) {
                $this->info($atm_transaction->amount . ' - ' . $atm_transaction->created_at->diffForHumans());
            }
        } else {
            $this->error('ACCOUNT_ERR');
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
