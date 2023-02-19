<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Problem extends \CoMAPI\AbstractRoute
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