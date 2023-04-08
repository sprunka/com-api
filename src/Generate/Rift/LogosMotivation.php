<?php

namespace CoMAPI\Generate\Rift;

use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogosMotivation extends \CoMAPI\AbstractRoute
{
    protected Generator $faker;

    private array $logosMotivation;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
        $this->logosMotivation = json_decode(file_get_contents(__DIR__ . '/../../../json_src/logos_motivation.json'), true);
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $allLogos = $this->logosMotivation;
        $firstRoll = $this->faker->randomElement($allLogos);
        $secondRoll = $this->faker->randomElement($firstRoll);

        return ['logos_motivation' => $secondRoll];
   }
}