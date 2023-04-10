<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Problem;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class ProblemTest extends TestCase
{
    private $problem;

    protected function setUp(): void
    {
        $this->problem = new Problem(faker: new Factory());
    }

    public function testGenerate()
    {
        $result = $this->problem->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('problem', $result);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Problem::class, $this->problem);
    }
}
