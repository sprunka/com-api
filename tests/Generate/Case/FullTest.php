<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Full;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class FullTest extends TestCase
{
    private $full;

    protected function setUp(): void
    {
        $fakerFactory = new Factory();
        $listFactory = new ListFactory();
        $recordFactory = new RecordFactory();
        $this->full = new Full(fakerFactory: $fakerFactory, listFactory: $listFactory, recordFactory: $recordFactory);
    }

    public function testGenerate()
    {
        $result = $this->full->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('rift_info', $result);
        $this->assertArrayHasKey('case_details', $result);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Full::class, $this->full);
    }
}
