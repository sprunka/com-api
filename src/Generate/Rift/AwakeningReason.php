<?php

namespace CoMAPI\Generate\Rift;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class AwakeningReason extends AbstractRoute
{
    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $awakeningLevelList = [
            "Gradually",
            "Purposefully",
            "Relic, Familiar, or Enclave",
            "Exposure",
            "Violently",
            "Mythos Resonance"
        ];

        $awakeningLevel = $this->faker->randomElement($awakeningLevelList);

        return ['awakening_reason' => $awakeningLevel];

    }
}