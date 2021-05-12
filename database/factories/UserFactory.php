<?php
use Illuminate\Support\Str;
use App\User;
use App\Hotel;
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
    static $password;

    return [
        'name'           => e($faker->name),
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
        'active'         => 1,
        'role'           => $faker->randomElement(['customer', 'employee', 'admin', 'accountant']),
        'hotel_id' => function () use ($faker) {
          if (Hotel::count())
            return $faker->randomElement(Hotel::pluck('id')->toArray());
          else return factory(Hotel::class)->create()->id;
        },
        'address'        => e($faker->address),
        'about'          => $faker->sentences(3, true),
        'pic_path'       => $faker->imageUrl(640, 480),
        'phone_number'   => $faker->unique()->phoneNumber,
        'verified'       => 1,
        'blood_group'    => $faker->randomElement(['a+', 'b+', 'ab', 'o+']),
        'nationality'    => 'burundaise',
        'gender'         => $faker->randomElement(['male', 'female']),
        'stripe_id' => null,
        'card_brand' => null,
        'card_last_four' => null,
        'trial_ends_at' => null,
    ];
});

$factory->state(User::class, 'master', [
    'role' => 'master'
]);

$factory->state(User::class, 'accountant', [
    'role' => 'accountant'
]);

$factory->state(User::class, 'admin', [
    'role' => 'admin'
]);

$factory->state(User::class, 'employee', [
    'role' => 'employee'
]);

$factory->state(User::class, 'customer', [
    'role' => 'customer'
]);
