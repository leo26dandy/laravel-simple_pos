<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Product;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(Product::class, function (Faker $faker) {
//     return [
//         'nama_barang' => $faker->unique()->name,
//         'deskripsi' => $faker->unique()->text,
//         'harga' => $faker->randomNumber(7),
//         'stok' => $faker->randomNumber(1),
//         // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         // 'remember_token' => Str::random(10),
//     ];
// });
$factory->define(Customer::class, function (Faker $faker) {
    return [
        'nama' => $faker->unique()->name,
        'telp' => $faker->phoneNumber,
        'alamat' => $faker->address,
        'email' => $faker->email,
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // 'remember_token' => Str::random(10),
    ];
});
