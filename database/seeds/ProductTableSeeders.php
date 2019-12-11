<?php

use App\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::unguard();
        Product::truncate();
        factory(Product::class, 10)->create();
        Product::reguard();
    }
}
