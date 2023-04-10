<?php

namespace CoMAPI\Generate\Rift;

use  CommonRoutes\AbstractRoute;

class MythosTheme extends AbstractRoute
{
    private array $mythosGroups;

    public function __construct()
    {
        $this->mythosGroups = json_decode(file_get_contents(__DIR__ . '/../../../json_src/mythos_themes.json'), true);
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