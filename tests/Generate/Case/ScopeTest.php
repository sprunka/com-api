<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Scope;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class ScopeTest extends TestCase
{
    private $scope;

    protected function setUp(): void
    {
        $this->scope = new Scope(faker: new Factory());
    }

    public function testGenerate()
    {
        $result = $this->scope->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('scope', $result);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Scope::class, $this->scope);
    }
}
