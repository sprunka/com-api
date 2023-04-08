<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\LogosMotivation;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class LogosMotivationTest extends TestCase
{
    protected LogosMotivation $logosMotivation;

    protected function setUp(): void
    {
        $this->logosMotivation = new LogosMotivation(new Factory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(LogosMotivation::class, $this->logosMotivation);
    }

    public function testGenerate()
    {
        for ($i = 0; $i < 10; $i++) {
            $generatedLogosMotivation = $this->logosMotivation->generate();

            $this->assertIsArray($generatedLogosMotivation);
            $this->assertArrayHasKey('logos_motivation', $generatedLogosMotivation);

            $this->assertNotEmpty($generatedLogosMotivation['logos_motivation']);
            $this->assertIsString($generatedLogosMotivation['logos_motivation']);
        }
    }
}
