<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Wrong;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class WrongTest extends TestCase
{
    private $wrong;

    protected function setUp(): void
    {
        $this->wrong = new Wrong(faker: new Factory());
    }

    public function testGenerate()
    {
        $result = $this->wrong->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('wrong', $result);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Wrong::class, $this->wrong);
    }
}
