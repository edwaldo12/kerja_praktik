<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
        'username' => 'Admin',
        'password' => '$2y$12$sCQAbtxK3wQRs6g.3cDus.WEGI8oYHeUK8wZL8Y5H8fbMfWGSRZei',
        'jenis_kelamin' => 'L',
        'alamat' => 'Jalan Pangeran Sakti No.23',
        'tanggal_lahir' => '2000-05-05',
        'email' => 'admin@gmail.com',
        'jabatan' => '1'
    ];
});
