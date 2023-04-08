<?php

namespace CoMAPI\Generate\Rift;

use CoMAPI\Generate\Rift\AwakeningReason;
use CoMAPI\Generate\Rift\Level;
use CoMAPI\Generate\Rift\Logos;
use CoMAPI\Generate\Rift\LogosMotivation;
use CoMAPI\Generate\Rift\Mythos;
use CoMAPI\Generate\Rift\MythosMotivation;
use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use CoMAPI\AbstractRoute;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;


class Base extends AbstractRoute
{
    protected Generator $faker;
    protected Factory $fakerFactory;
    protected ListFactory $listFactory;
    protected RecordFactory $recordFactory;

    public function __construct(Factory $fakerFactory, ListFactory $listFactory, RecordFactory $recordFactory)
    {
        $this->fakerFactory = $fakerFactory;
        $this->faker = $fakerFactory::create();
        $this->listFactory = $listFactory;
        $this->recordFactory = $recordFactory;
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $occupation = [];
        $logosThemes = [];
        $mythosThemes = [];
        $mythosThemes['mythos_themes'] = [];
        $logosThemes['logos_themes'] = [];
        $numberOfLogosThemes = 4;
        $occupation += (new Level(faker: $this->fakerFactory))->generate();
        if (in_array("Awakening", $occupation)) {
            $numberOfLogosThemes = 3;
        }
        if (in_array("Touched", $occupation)) {
            $numberOfLogosThemes = rand(2,3);
        }
        if (in_array("Borderliner", $occupation)) {
            $numberOfLogosThemes = rand(1,2);
        }
        if (in_array("Legendary", $occupation)) {
            $numberOfLogosThemes = 1;
        }
        if (in_array("Avatar", $occupation)) {
            $numberOfLogosThemes = 0;
        }

        $occupation += (new Logos(faker: $this->fakerFactory))->generate();
        $occupation += (new LogosMotivation(faker: $this->fakerFactory))->generate();
        if (!in_array('Sleeper', $occupation)){
            $occupation += (new Mythos())->generate();
            $occupation += (new MythosMotivation(faker: $this->fakerFactory))->generate();
            $occupation += (new AwakeningReason(faker: $this->fakerFactory))->generate();
        }
        $numberOfMythosThemes = 4 - $numberOfLogosThemes;

        for ($xx = 1; $xx <= $numberOfLogosThemes; $xx++) {
            $logosThemeTest = (new LogosTheme())->generate();
            while (in_array($logosThemeTest['logos_type'], array_column($logosThemes['logos_themes'], 'logos_type'))) {
                $logosThemeTest = (new LogosTheme())->generate();
            }
            $logosThemes['logos_themes'][$xx] = $logosThemeTest;
        }
        for ($yy = 1; $yy <= $numberOfMythosThemes; $yy++) {
            $mythosThemeTest = (new MythosTheme())->generate();
            while (in_array($mythosThemeTest['mythos_type'], array_column($mythosThemes['mythos_themes'], 'mythos_type'))) {
                $mythosThemeTest = (new MythosTheme())->generate();
            }
            $mythosThemes['mythos_themes'][$yy] = $mythosThemeTest;
        }
        $occupation += $logosThemes;
        $occupation += $mythosThemes;

        return ['rift_details' => $occupation];
    }
}