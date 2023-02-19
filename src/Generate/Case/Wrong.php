<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Wrong extends \CoMAPI\AbstractRoute
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
        $wrongsList = [
            "Betrayal",
            "Bullying",
            "Infidelity",
            "Lying or hiding the truth",
            "Psychological abuse",
            "Taking something belonging to another, even if lawfully"
        ];

        $wrong = $this->faker->randomElement($wrongsList);

        return ['wrong' => $wrong];

    }
}