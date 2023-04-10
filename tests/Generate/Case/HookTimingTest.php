<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\HookTiming;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class HookTimingTest extends TestCase
{
    protected $hookTiming;

    protected function setUp(): void
    {
        $this->hookTiming = new HookTiming(new Factory());
    }

    public function testGenerate()
    {
        $result = $this->hookTiming->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('timing', $result);

        $timingList = [
            "The deed is done; the crew must find the perpetrator(s)",
            "The deed is done, but the crew must stop it from happening again",
            "The act has been committed, but it's only a small step on the way to a bigger crime",
            "A crime is currently taking place, and the crew must stop it",
            "The crew is at the scene shortly before the event is about to unfold",
            "Something is brewing somewhere, the crew must find out what it is and stop it"
        ];

        $this->assertContains($result['timing'], $timingList);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(HookTiming::class, $this->hookTiming);
    }
}
