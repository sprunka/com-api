<?php

namespace CoMAPI\Generate\Case;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;

class Theme extends AbstractRoute
{

    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $themeList = [
            "Love triangle gone bad",
            "Organized crime",
            "A heist",
            "Illegal or unethical experiments",
            "Corporate shenanigans or political corruption",
            "Police inefficiency, corruption, or brutality"
        ];

        $theme = $this->faker->randomElement($themeList);

        return ['theme' => $theme];

    }
}