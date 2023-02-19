<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HookTiming extends \CoMAPI\AbstractRoute
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
        $timingList = [
            "The deed is done; the crew must find the perpetrator(s)",
            "The deed is done, but the crew must stop it from happening again",
            "The act has been committed, but it's only a small step on the way to a bigger crime",
            "A crime is currently taking place, and the crew must stop it",
            "The crew is at the scene shortly before the event is about to unfold",
            "Something is brewing somewhere, the crew must find out what it is and stop it"
        ];

        $timing = $this->faker->randomElement($timingList);

        return ['timing' => $timing];

    }
}