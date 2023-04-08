<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Format extends \CoMAPI\AbstractRoute
{

    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $formatList = [
            "Whodunit",
            "Cold case",
            "The clock is ticking",
            "A quest narrative",
            "Overcoming the monster",
            "Unusual"
        ];

        $format = $this->faker->randomElement($formatList);

        return ['format' => $format];

    }
}