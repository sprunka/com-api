<?php

namespace CoMAPI\Generate\Rift;

use Faker\Factory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Faker\Generator;
use CoMAPI\AbstractRoute;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use CommonRoutes\Generic\RecordList;
use CommonRoutes\Generic\Record;

class MythosTheme extends AbstractRoute
{
    protected Generator $faker;
    private array $mythosGroups;

    public function __construct()
    {
        $this->mythosGroups = json_decode(file_get_contents(__DIR__ . '/../../../json_src/mythos_themes.json'), true);
    }
    public function __invoke(ServerRequestInterface $request, Response $response, array $args = []): Response
    {
        $outArray = $this->generate();

        return parent::outputResponse($response, $outArray);
    }

    public function generate($type = 'first', $gender = 'any', $laban = false):array
    {
        $allMythos = $this->mythosGroups;
        $firstRollKey = array_rand($allMythos);
        $secondRollKey = array_rand($allMythos[$firstRollKey]);
        $innerRoll = $allMythos[$firstRollKey][$secondRollKey];

        return [
            'mythos_type' => $firstRollKey,
            'mythos_suggestion' => $innerRoll
        ];
    }

}