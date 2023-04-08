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

class LogosTheme extends AbstractRoute
{
    private array $logosGroups;

    public function __construct()
    {
        $this->logosGroups = json_decode(file_get_contents(__DIR__ . '/../../../json_src/logo_themes.json'), true);
    }

    public function generate($type = 'first', $gender = 'any', $laban = false):array
    {
        $allLogos = $this->logosGroups;
        $firstRollKey = array_rand($allLogos);
        $secondRollKey = array_rand($allLogos[$firstRollKey]);
        //$innerRollKey = array_rand($allLogos[$firstRollKey][$secondRollKey]);
        $innerRoll = $allLogos[$firstRollKey][$secondRollKey];

        return [
            'logos_type' => $firstRollKey,
            'possible_theme' => $innerRoll
        ];

//        $allLogos = $this->logosGroups;
//        $firstRoll = $this->faker->randomElement($allLogos);
//        $secondRoll = $this->faker->randomElement($firstRoll);
//        return [
//            'logos_theme' => $secondRoll
//        ];
    }

}