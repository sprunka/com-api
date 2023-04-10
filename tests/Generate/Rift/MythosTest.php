<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\Mythos;
use PHPUnit\Framework\TestCase;

class MythosTest extends TestCase
{
    protected Mythos $mythos;

    protected function setUp(): void
    {
        $this->mythos = new Mythos();
    }

    public function testGenerate()
    {
        for ($i = 0; $i < 10; $i++) {
            $generatedMythos = $this->mythos->generate();

            $this->assertIsArray($generatedMythos);
            $this->assertArrayHasKey('mythos_type', $generatedMythos);
            $this->assertArrayHasKey('mythos_suggestion', $generatedMythos);

            $this->assertNotEmpty($generatedMythos['mythos_type']);
            $this->assertIsString($generatedMythos['mythos_type']);

            $this->assertNotEmpty($generatedMythos['mythos_suggestion']);
            $this->assertIsString($generatedMythos['mythos_suggestion']);
        }
    }
}
