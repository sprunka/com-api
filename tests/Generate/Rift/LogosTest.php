<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\Logos;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class LogosTest extends TestCase
{
    protected Logos $logos;

    protected function setUp(): void
    {
        $this->logos = new Logos(new Factory());
    }


    public function test__construct()
    {
        $this->assertInstanceOf(Logos::class, $this->logos);
    }

    public function testGenerate()
    {
        for ($i = 0; $i < 10; $i++) {
            $generatedLogos = $this->logos->generate();

            $this->assertIsArray($generatedLogos);
            $this->assertArrayHasKey('logos', $generatedLogos);

            $this->assertNotEmpty($generatedLogos['logos']);
            $this->assertIsString($generatedLogos['logos']);
        }
    }
}
