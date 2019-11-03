<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'role'=> rand(1,4),
        'country' => rand(1,9),
        'nationality' => rand(1,9),
        'place_of_birth' => rand(1,9),
        'height' => rand(150,200),
        'whats_app' => $faker->unique()->phoneNumber,
        'phone' => $faker->unique()->phoneNumber,
        'facebook' => $faker->unique()->url,
        'photo' => $faker->imageUrl(300,300),
        'salary' => $faker->randomDigit,
        'education' => rand(1,2),
        'no_of_child' => rand(1,5),
        'completion' => rand(1,5),
        'gender' => rand(1,2),
        'bio' => $faker->paragraph,
        'religion' => rand(1,5),
        'passport_date_of_issue' => $faker->date('y-m-d'),
        'passport' => $faker->randomDigit,
        'available_at' => $faker->date('y-m-d'),
        'arabic_lang'=> rand(1,3),
        'mandarin_lang' => rand(1,3),
        'job_type' => rand(1,8),
        'english_lang' => rand(1,3),
        'worked_in' => rand(1,9),
        'experience' => rand(1,4),
        'weight' => rand(40,100),
        'passport_date_of_exp' => $faker->date('y-m-d'),
        'age' => rand(15,40),
        'marital_status' => rand(1,3),
        'exp_visa' => $faker->date('y-m-d'),
        'brand' => $faker->company,
        'contract' => rand(1,2),
        'created_at' => now()->subDay(random_int(1,180)),
    ];
});

$factory->define(\App\Entities\Skill::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,

    ];
});

$factory->define(\App\Entities\Setting::class, function (Faker $faker) {
    return [
        'fb' => $faker->url,
        'tw' => $faker->url,
        'ln' => $faker->url,
        'yt' => $faker->url,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'lang_id' => rand(1,3),
        'country_id' => rand(1,9),

    ];
});




$factory->define(\App\Entities\Country::class, function (Faker $faker) {
    return [
        "title" => $faker->unique()->country,

    ];
});

$factory->define(\App\Entities\Currency::class, function (Faker $faker) {
    return [
        "title" => $faker->unique()->currencyCode,

    ];
});


