<?php

namespace CoMAPI\Generate\Case;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class Problem extends AbstractRoute
{

    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $problemList = [
            "Disagreement",
            "Hazard to health or safety",
            "Natural disaster",
            "Loss or suicide",
            "Misfortune",
            "Rivalry"
        ];

        $problem = $this->faker->randomElement($problemList);

        return ['problem' => $problem];

    }
}