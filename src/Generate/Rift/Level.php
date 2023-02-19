<?php

namespace CoMAPI\Generate\Rift;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Level extends \CoMAPI\AbstractRoute
{
    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    /**
     * @inheritDoc
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        return parent::outputResponse($response, $this->generate());
    }
    public function generate($type = '', $gender = '', $laban = false): array
    {
        $awakeningLevelList = [
            "Sleeper",
            "Awakening",
            "Touched",
            "Borderliner",
            "Legendary",
            "Avatar"
        ];

        $awakeningLevel = $this->faker->randomElement($awakeningLevelList);

        return ['rift_strength' => $awakeningLevel];

    }
}