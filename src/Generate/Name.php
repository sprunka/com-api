<?php

namespace CoMAPI\Generate;

use Faker\Factory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Faker\Generator;
use CoMAPI\AbstractRoute;
use CoMAPI\Generic\ListFactory;
use CoMAPI\Generic\RecordFactory;
use CoMAPI\Generic\RecordList;
use CoMAPI\Generic\Record;

class Name extends AbstractRoute
{
    protected Generator $faker;
    protected RecordList $neutralNames;

    public function __construct(Factory $faker, ListFactory $listFactory, RecordFactory $recordFactory)
    {
        $this->faker = $faker::create();
        $fullList = $listFactory::create();
        $fullList->loadFile(__DIR__ . '/../../json_src/neutralNames.json', false);
        $this->neutralNames = $fullList;
    }
    public function __invoke(ServerRequestInterface $request, Response $response, array $args = []): Response
    {
        $type = strtolower($args['type']) ?? 'full';
        $gender = strtolower($args['gender'] )?? 'any';
        $outArray = $this->generate($type, $gender);

        return parent::outputResponse($response, $outArray);
    }


    public function generate($type = 'first', $gender = 'any', $laban = false):array
    {
        $neutralName = false;
        $name = false;
        if ($gender === 'neutral') {
            /** @var Record $neutralNameRecord */
            $neutralNameRecord = $this->neutralNames->current();
            $selector = rand(0, $neutralNameRecord->count()-1);
            $neutralName = $neutralNameRecord->{'_' . $selector};
            $gender = '';
        }

        switch ($type) {
            case 'first':
                $fname = $this->faker->firstName($gender);
                if ($neutralName) {
                    $fname = $neutralName;
                }
                $lname = null;
                break;
            case 'last':
                $fname = null;
                $lname = $this->faker->lastName;
                break;
            case 'full':
                $fname = $this->faker->firstName($gender);
                if ($neutralName) {
                    $fname = $neutralName;
                }
                $lname = $this->faker->lastName;
                break;
            default:
                $name = $this->faker->name($gender);
        }

        if (!$name) {
            $name = trim($fname . ' ' . $lname);
        }

        return [
            'name' => $name
        ];
    }

}