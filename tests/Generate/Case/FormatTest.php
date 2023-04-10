<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Format;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{
    protected $format;

    protected function setUp(): void
    {
        $this->format = new Format(new Factory());
    }

    public function testGenerate()
    {
        $result = $this->format->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('format', $result);

        $formatList = [
            "Whodunit",
            "Cold case",
            "The clock is ticking",
            "A quest narrative",
            "Overcoming the monster",
            "Unusual"
        ];

        $this->assertContains($result['format'], $formatList);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Format::class, $this->format);
    }
}
