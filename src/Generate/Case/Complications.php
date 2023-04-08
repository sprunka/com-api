<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Complications extends \CoMAPI\AbstractRoute
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