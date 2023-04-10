<?php

namespace CoMAPI\Generate\Rift;

use  CommonRoutes\AbstractRoute;

class Mythos extends AbstractRoute
{
    private array $mythosGroups;

    public function __construct()
    {
        $this->mythosGroups = json_decode(file_get_contents(__DIR__ . '/../../../json_src/mythos.json'), true);
    }

    public function generate($type = 'first', $gender = 'any', $laban = false):array
    {
        $allMythos = $this->mythosGroups;
        $firstRollKey = array_rand($allMythos);
        $secondRollKey = array_rand($allMythos[$firstRollKey]);
        $innerRollKey = array_rand($allMythos[$firstRollKey][$secondRollKey]);
        $innerRoll = $allMythos[$firstRollKey][$secondRollKey][$innerRollKey];

        return [
            'mythos_type' => $secondRollKey,
            'mythos_suggestion' => $innerRoll
        ];
    }

}