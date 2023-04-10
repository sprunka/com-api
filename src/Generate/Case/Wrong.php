<?php

namespace CoMAPI\Generate\Case;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class Wrong extends AbstractRoute
{

    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $wrongsList = [
            "Betrayal",
            "Bullying",
            "Infidelity",
            "Lying or hiding the truth",
            "Psychological abuse",
            "Taking something belonging to another, even if lawfully"
        ];

        $wrong = $this->faker->randomElement($wrongsList);

        return ['wrong' => $wrong];

    }
}