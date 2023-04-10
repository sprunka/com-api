<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Theme;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class ThemeTest extends TestCase
{
    private $theme;

    protected function setUp(): void
    {
        $this->theme = new Theme(faker: new Factory());
    }

    public function testGenerate()
    {
        $result = $this->theme->generate();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('theme', $result);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Theme::class, $this->theme);
    }
}
