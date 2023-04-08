<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Scope extends \CoMAPI\AbstractRoute
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