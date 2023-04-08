<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\MythosTheme;
use PHPUnit\Framework\TestCase;

class MythosThemeTest extends TestCase
{
    protected MythosTheme $mythosTheme;

    protected function setUp(): void
    {
        $this->mythosTheme = new MythosTheme();
    }

    public function testGenerate()
    {
        $generatedMythosTheme = $this->mythosTheme->generate();

        $this->assertIsArray($generatedMythosTheme);
        $this->assertArrayHasKey('mythos_type', $generatedMythosTheme);
        $this->assertArrayHasKey('mythos_suggestion', $generatedMythosTheme);

        $this->assertNotEmpty($generatedMythosTheme['mythos_type']);
        $this->assertNotEmpty($generatedMythosTheme['mythos_suggestion']);

        $this->assertIsString($generatedMythosTheme['mythos_type']);
        $this->assertIsString($generatedMythosTheme['mythos_suggestion']);
    }
}
