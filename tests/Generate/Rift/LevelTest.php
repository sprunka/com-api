<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\Level;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class LevelTest extends TestCase
{
    protected Level $level;

    protected function setUp(): void
    {
        $this->level = new Level(new Factory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Level::class, $this->level);
    }

    public function testGenerate()
    {
        $awakeningLevelList = [
            "Sleeper",
            "Awakening",
            "Touched",
            "Borderliner",
            "Legendary",
            "Avatar"
        ];

        for ($i = 0; $i < 10; $i++) {
            $generatedLevel = $this->level->generate();

            $this->assertIsArray($generatedLevel);
            $this->assertArrayHasKey('rift_strength', $generatedLevel);

            $this->assertNotEmpty($generatedLevel['rift_strength']);
            $this->assertIsString($generatedLevel['rift_strength']);
            $this->assertContains($generatedLevel['rift_strength'], $awakeningLevelList);
        }
    }
}
