<?php

namespace CoMAPI\Test\Generate\Rift;

use CoMAPI\Generate\Rift\Base;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    protected Base $base;

    protected function setUp(): void
    {
        $this->base = new Base(new Factory(), new ListFactory(), new RecordFactory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Base::class, $this->base);
    }

    public function testGenerate()
    {
        for ($i = 0; $i < 25; $i++) {
            $generatedRiftDetails = $this->base->generate();

            $this->assertIsArray($generatedRiftDetails);
            $this->assertArrayHasKey('rift_details', $generatedRiftDetails);

            $riftDetails = $generatedRiftDetails['rift_details'];
            $this->assertIsArray($riftDetails);

            $expectedKeys = [
                'rift_strength',
                'logos',
                'logos_motivation',
                'mythos_themes',
                'logos_themes'
            ];

            foreach ($expectedKeys as $key) {
                $this->assertArrayHasKey($key, $riftDetails);
            }

            $this->assertNotEmpty($riftDetails['rift_strength']);
            $this->assertNotEmpty($riftDetails['logos']);
            $this->assertNotEmpty($riftDetails['logos_motivation']);

            $this->assertIsArray($riftDetails['mythos_themes']);
            $this->assertIsArray($riftDetails['logos_themes']);
        }
    }
}
