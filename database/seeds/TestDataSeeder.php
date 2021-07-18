<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create customer
        $customer_id = DB::table('customers')->insertGetId([
            'first_name' => 'Nathan',
            'last_name' => 'Wilce'
        ]);

        $account_one = [
            'id' => 12345678,
            'pin' => 1234,
            'balance' => 500,
            'overdraft_maximum' => 100
        ];

        $account_two = [
            'id' => 87654321,
            'pin' => 4321,
            'balance' => 100,
            'overdraft_maximum' => 0
        ];

        // Create two accounts (both owned by the same customer in this instance for testing purposes)
        DB::table('accounts')->insert([
            $account_one,
            $account_two
        ]);

        // Link accounts to customer
        DB::table('accounts_customers')->insert([
            [
                'account_id' => $account_one['id'],
                'customer_id' => $customer_id
            ],            
            [
                'account_id' => $account_two['id'],
                'customer_id' => $customer_id
            ]
        ]);

        
    }
}
