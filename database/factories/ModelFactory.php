<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{User, Cliente};
use Faker\Generator as Faker;

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
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->phoneNumber,
        'dataDeNascimento' => $faker->email,
        'endereco' => $faker->streetAddress,
        'complemento' => $faker->secondaryAddress,
        'bairro' => $faker->streetSuffix,
        'cep' => $faker->postcode
    ];
});

$factory->define(Pastel::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'preco' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'foto' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQYV2NgYAAAAAMAAWgmWQ0AAAAASUVORK5CYII='
    ];
});

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'codigoCliente' => $faker->name,
        'codigoPastel' => $faker->unique()->number,
    ];
});
