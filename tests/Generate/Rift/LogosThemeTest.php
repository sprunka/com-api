<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\LogosTheme;
use PHPUnit\Framework\TestCase;

class LogosThemeTest extends TestCase
{
    protected LogosTheme $logosTheme;

    protected function setUp(): void
    {
        $this->logosTheme = new LogosTheme();
    }

    public function testGenerate()
    {
        for ($i = 0; $i < 10; $i++) {
            $generatedLogosTheme = $this->logosTheme->generate();

            $this->assertIsArray($generatedLogosTheme);
            $this->assertArrayHasKey('logos_type', $generatedLogosTheme);
            $this->assertArrayHasKey('possible_theme', $generatedLogosTheme);

            $this->assertNotEmpty($generatedLogosTheme['logos_type']);
            $this->assertIsString($generatedLogosTheme['logos_type']);

            $this->assertNotEmpty($generatedLogosTheme['possible_theme']);
            $this->assertIsString($generatedLogosTheme['possible_theme']);
        }
    }
}
