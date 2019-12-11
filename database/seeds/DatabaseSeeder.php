<?php

use App\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(ProductTableSeeders::class);
        Customer::unguard();
        Customer::truncate();
        factory(Customer::class, 8)->create();
        Customer::reguard();
    }
}
