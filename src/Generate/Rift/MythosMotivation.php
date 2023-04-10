<?php

namespace CoMAPI\Generate\Rift;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class MythosMotivation extends AbstractRoute
{
    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $mythosMotivations = [
            "To reenact a certain part of their story in the City",
            "To find people who fit major roles in their story, and make them act according to it",
            "To obtain an important item from their story",
            "To overcome a challenge they faced or best an enemy from their story",
            "To save someone or protect something from their story",
            "To become who they are at the end of their story, physically and/or mentally"
        ];

        $mythosMotivation = $this->faker->randomElement($mythosMotivations);

        return ['mythos_motivation' => $mythosMotivation];

    }
}