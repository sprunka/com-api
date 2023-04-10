<?php

namespace CoMAPI\Generate\Rift;

use  CommonRoutes\AbstractRoute;

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
        $innerRoll = $allLogos[$firstRollKey][$secondRollKey];

        return [
            'logos_type' => $firstRollKey,
            'possible_theme' => $innerRoll
        ];
    }

}