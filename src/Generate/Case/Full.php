<?php

namespace CoMAPI\Generate\Case;

use CoMAPI\Generate\NPC;
use CommonRoutes\AbstractRoute;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;
use Faker\Generator;

class Full extends AbstractRoute
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
        $case = (new Only(fakerFactory: $this->fakerFactory, listFactory: $this->listFactory, recordFactory: $this->recordFactory))->generate()['case_details'];
        $rift = (new NPC(fakerFactory: $this->fakerFactory, listFactory: $this->listFactory, recordFactory: $this->recordFactory))->generate();

        return ['rift_info'=> $rift, 'case_details' => $case];
    }
}