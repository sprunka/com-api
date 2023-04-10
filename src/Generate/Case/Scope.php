<?php

namespace CoMAPI\Generate\Case;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class Scope extends AbstractRoute
{

    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $scopeList = [
            "Limited",
            "Small",
            "Local",
            "Large",
            "Deep",
            "All-encompassing"
        ];

        $scope = $this->faker->randomElement($scopeList);

        return ['scope' => $scope];

    }
}