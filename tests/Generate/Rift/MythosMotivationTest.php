<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\MythosMotivation;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class MythosMotivationTest extends TestCase
{
    protected MythosMotivation $mythosMotivation;

    protected function setUp(): void
    {
        $this->mythosMotivation = new MythosMotivation(new Factory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(MythosMotivation::class, $this->mythosMotivation);
    }

    public function testGenerate()
    {
        $generatedMythosMotivation = $this->mythosMotivation->generate();

        $this->assertIsArray($generatedMythosMotivation);
        $this->assertArrayHasKey('mythos_motivation', $generatedMythosMotivation);

        $this->assertNotEmpty($generatedMythosMotivation['mythos_motivation']);
        $this->assertIsString($generatedMythosMotivation['mythos_motivation']);
    }
}
