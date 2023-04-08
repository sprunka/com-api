<?php

namespace CoMAPI\Generate\Case;

use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Hooks extends \CoMAPI\AbstractRoute
{

    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $hookList = [
            "The victim(s) of the affected party approach the crew, they are in need",
            "Someone related to the victim approaches the crew, they ask for help or an investigation",
            "Someone affected by a 2nd or 3rd degree consequence of the crime approaches the crew, on a matter that only connects into the bigger case after being investigated.",
            "The perpetrator(s) or their allies approach the crew themselves, under cover or in the open, to blackmail, warn, or ask for help with a situation that is going out of control",
            "Reports of crime in the media draw the attention of the crew, based on issues that matter to them",
            "The crew members are witnesses, or the evidence crops up during the crew members' investigation of their Mysteries or of a crew Mystery"
        ];

        $hook = $this->faker->randomElement($hookList);

        return ['hook' => $hook];

    }
}