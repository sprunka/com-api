<?php

namespace CoMAPI\Generate\Case;

use CoMAPI\Generate\NPC;
use CoMAPI\Generate\Rift\Base;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Only extends \CoMAPI\AbstractRoute
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


    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args = []) : Response
    {
        return parent::outputResponse($response, $this->generate());
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $case = [];

        $crimeWrongProblem = rand(0,2);
        $case += match ($crimeWrongProblem) {
            0 => (new Crime(faker: $this->fakerFactory))->generate(),
            1 => (new Wrong(faker: $this->fakerFactory))->generate(),
            default => (new Problem(faker: $this->fakerFactory))->generate(),
        };

        $case += (new RiftInvolvement(faker: $this->fakerFactory))->generate();
        $case += (new Scope(faker: $this->fakerFactory))->generate();
        $case += (new Theme(faker: $this->fakerFactory))->generate();
        $case += (new Format(faker: $this->fakerFactory))->generate();
        $case += (new Hooks(faker: $this->fakerFactory))->generate();
        $case += (new HookTiming(faker: $this->fakerFactory))->generate();
        $case += (new Complications(faker: $this->fakerFactory))->generate();

        return ['case_details' => $case];
    }
}