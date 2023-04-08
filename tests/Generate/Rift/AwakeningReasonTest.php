<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\AwakeningReason;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class AwakeningReasonTest extends TestCase
{
    protected AwakeningReason $awakeningReason;

    protected function setUp(): void
    {
        $this->awakeningReason = new AwakeningReason(new Factory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(AwakeningReason::class, $this->awakeningReason);
    }

    public function testGenerate()
    {
        $awakeningReasonList = [
            "Gradually",
            "Purposefully",
            "Relic, Familiar, or Enclave",
            "Exposure",
            "Violently",
            "Mythos Resonance"
        ];

        for ($i = 0; $i < 10; $i++) {
            $generatedAwakeningReason = $this->awakeningReason->generate();

            $this->assertIsArray($generatedAwakeningReason);
            $this->assertArrayHasKey('awakening_reason', $generatedAwakeningReason);

            $awakeningReason = $generatedAwakeningReason['awakening_reason'];
            $this->assertIsString($awakeningReason);
            $this->assertContains($awakeningReason, $awakeningReasonList);
        }
    }
}
