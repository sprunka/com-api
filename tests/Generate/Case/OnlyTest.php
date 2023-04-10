<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Only;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory as FakerFactory;
use PHPUnit\Framework\TestCase;

class OnlyTest extends TestCase
{
    protected $only;

    protected function setUp(): void
    {
        $fakerFactory = new FakerFactory();
        $listFactory = new ListFactory();
        $recordFactory = new RecordFactory();
        $this->only = new Only($fakerFactory, $listFactory, $recordFactory);
    }

    public function testGenerate()
    {
        $result = $this->only->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('case_details', $result);

        // Check that the result has the correct keys
        $expectedKeys = [
            'rift_involvement', 'scope', 'theme', 'format', 'hook', 'timing', 'complication'
        ];

        // Check for either 'crime' or 'wrong' or 'problem'
        $this->assertTrue(
            isset($result['case_details']['crime'])
            || isset($result['case_details']['wrong'])
            || isset($result['case_details']['problem']),
            "Expected key 'crime', 'wrong' or 'problem' not found"
        );

        foreach ($expectedKeys as $key) {
            $this->assertArrayHasKey($key, $result['case_details']);
        }
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Only::class, $this->only);
    }
}
