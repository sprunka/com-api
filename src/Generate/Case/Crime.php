<?php

namespace CoMAPI\Generate\Case;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class Crime extends AbstractRoute
{
    protected Generator $faker;

    private array $crimes;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
        $this->crimes = json_decode(file_get_contents(__DIR__ . '/../../../json_src/crimes.json'), true);
    }

    public function generate($type = 'first', $gender = 'any', $laban = false):array
    {
        $allCrimes = $this->crimes;
        $firstRoll = $this->faker->randomElement($allCrimes);
        $secondRoll = $this->faker->randomElement($firstRoll);
        return [
            'crime' => $secondRoll
        ];
    }
}