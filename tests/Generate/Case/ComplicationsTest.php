<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Complications;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class ComplicationsTest extends TestCase
{
    protected Complications $complications;

    protected function setUp(): void
    {
        $this->complications = new Complications(new Factory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Complications::class, $this->complications);
    }

    public function testGenerate()
    {
        $scopeList = [
            "The truth runs deeper than you know",
            "There's always a middleman",
            "Remember that other incident?",
            "The Bodyguard",
            "The Blindside",
            "The Redeemable"
        ];

        for ($i = 0; $i < 10; $i++) {
            $generatedComplications = $this->complications->generate();

            $this->assertIsArray($generatedComplications);
            $this->assertArrayHasKey('complication', $generatedComplications);

            $complication = $generatedComplications['complication'];
            $this->assertIsString($complication);
            $this->assertContains($complication, $scopeList);
        }
    }
}
