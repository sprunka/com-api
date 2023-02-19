<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Theme extends \CoMAPI\AbstractRoute
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