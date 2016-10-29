<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'status' => '1',
        'admin' => '0',
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->unique()->numberBetween($min=1, $max=50),
        'title' => $faker->word,
        'content' => $faker->realText(2000),
        'reference' => $faker->url,
        'avg_rating' => '-1',
        'no_of_rating' => '0',
    ];
});

$factory->defineAs(App\Article::class, 'technical', function ($faker) use ($factory){
	$article = $factory->raw(App\Article::class);
	return array_merge($article, ['category_id' => '1' ]);
});
$factory->defineAs(App\Article::class, 'fun', function ($faker) use ($factory){
	$article = $factory->raw(App\Article::class);
	return array_merge($article, ['category_id' => '2' ]);
});
$factory->defineAs(App\Article::class, 'academics', function ($faker) use ($factory){
	$article = $factory->raw(App\Article::class);
	return array_merge($article, ['category_id' => '3' ]);
});
$factory->defineAs(App\Article::class, 'business', function ($faker) use ($factory){
	$article = $factory->raw(App\Article::class);
	return array_merge($article, ['category_id' => '4' ]);
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=50),
        'article_id' => $faker->numberBetween($min=1, $max=92),
        'content' => $faker->realText(100),
    ];
});
$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'start_time' => '2016-10-29 20:00:00',
        'duration' => '0000-00-4 00:00:00',
        'end_time' => '2016-11-02 20:00:00',
    ];
});

