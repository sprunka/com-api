<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\RiftInvolvement;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class RiftInvolvementTest extends TestCase
{
    private $riftInvolvement;

    protected function setUp(): void
    {
        $this->riftInvolvement = new RiftInvolvement(faker: new Factory());
    }

    public function testGenerate()
    {
        $result = $this->riftInvolvement->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('rift_involvement', $result);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(RiftInvolvement::class, $this->riftInvolvement);
    }
}
