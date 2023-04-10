<?php

namespace CoMAPI\Generate\Case;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class Complications extends AbstractRoute
{

    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $scopeList = [
            "The truth runs deeper than you know",
            "There's always a middleman",
            "Remember that other incident?",
            "The Bodyguard",
            "The Blindside",
            "The Redeemable"
        ];

        $scope = $this->faker->randomElement($scopeList);

        return ['complication' => $scope];

    }
}