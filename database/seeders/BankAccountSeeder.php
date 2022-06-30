<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BankAccount;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create([
            'user_id'           => 6,
            'account_number'    => '2022-000006-0',
            'balance'           => 200.0,
        ]);
        BankAccount::create([
            'user_id'           => 7,
            'account_number'    => '2022-000007-0',
            'balance'           => 200.0,
        ]);
    }
}
