<?php

namespace CoMAPI\Test\Generate;

use CoMAPI\Generate\NPC;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class NPCTest extends TestCase
{
    protected NPC $npc;

    protected function setUp(): void
    {
        $this->npc = new NPC(new Factory(), new ListFactory(), new RecordFactory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(NPC::class, $this->npc);
    }

    public function testGenerate()
    {
        $generatedNPC = $this->npc->generate();

        $this->assertIsArray($generatedNPC);
        $this->assertArrayHasKey('name', $generatedNPC);
        $this->assertArrayHasKey('gender', $generatedNPC);
        $this->assertArrayHasKey('rift_details', $generatedNPC);
        $this->assertArrayHasKey('physical_description', $generatedNPC);
        $this->assertArrayHasKey('background_details', $generatedNPC);
        $this->assertArrayHasKey('mannerisms', $generatedNPC);
        $this->assertArrayHasKey('vocal_tips', $generatedNPC);
        $this->assertArrayHasKey('tableTitle', $generatedNPC);

        $this->assertNotEmpty($generatedNPC['name']);
        $this->assertNotEmpty($generatedNPC['gender']);
        $this->assertNotEmpty($generatedNPC['rift_details']);
        $this->assertNotEmpty($generatedNPC['physical_description']);
        $this->assertNotEmpty($generatedNPC['background_details']);
        $this->assertNotEmpty($generatedNPC['mannerisms']);
        $this->assertNotEmpty($generatedNPC['vocal_tips']);
        $this->assertNotEmpty($generatedNPC['tableTitle']);

        $this->assertIsString($generatedNPC['name']);
        $this->assertIsString($generatedNPC['gender']);
        $this->assertIsArray($generatedNPC['rift_details']);
        $this->assertIsArray($generatedNPC['physical_description']);
        $this->assertIsArray($generatedNPC['background_details']);
        $this->assertIsArray($generatedNPC['mannerisms']);
        $this->assertIsArray($generatedNPC['vocal_tips']);
        $this->assertIsString($generatedNPC['tableTitle']);
    }
}
