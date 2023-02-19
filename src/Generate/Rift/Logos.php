<?php

namespace CoMAPI\Generate\Rift;

use Faker\Factory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Faker\Generator;
use CoMAPI\AbstractRoute;
use CoMAPI\Generic\ListFactory;
use CoMAPI\Generic\RecordFactory;
use CoMAPI\Generic\RecordList;
use CoMAPI\Generic\Record;

class Logos extends AbstractRoute
{
    protected Generator $faker;

    private array $logosGroups;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
        $this->logosGroups = json_decode(file_get_contents(__DIR__ . '/../../../json_src/logos.json'), true);
    }
    public function __invoke(ServerRequestInterface $request, Response $response, array $args = []): Response
    {
        $outArray = $this->generate();

        return parent::outputResponse($response, $outArray);
    }


    public function generate($type = 'first', $gender = 'any', $laban = false):array
    {
        $allLogos = $this->logosGroups;
        $firstRoll = $this->faker->randomElement($allLogos);
        $secondRoll = $this->faker->randomElement($firstRoll);
        return [
            'logos' => $secondRoll
        ];
    }

}