<?php

namespace CoMAPI\Generate\Rift;

use Faker\Factory;
use Faker\Generator;
use CommonRoutes\AbstractRoute;

class Logos extends AbstractRoute
{
    protected Generator $faker;

    private array $logosGroups;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
        $this->logosGroups = json_decode(file_get_contents(__DIR__ . '/../../../json_src/logos.json'), true);
    }

    public function generate($type = 'first', $gender = 'any', $laban = false):array
    {
        $allLogos = $this->logosGroups;
        $firstRoll = $this->faker->randomElement($allLogos);
        $secondRoll = $this->faker->randomElement($firstRoll);
        return [
            'logos' => $secondRoll
        ];
    }

}