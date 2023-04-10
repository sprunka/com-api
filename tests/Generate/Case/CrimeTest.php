<?php

namespace CoMAPI\Test\Generate\Case;

use CoMAPI\Generate\Case\Crime;
use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class CrimeTest extends TestCase
{
    protected Crime $crime;

    protected function setUp(): void
    {
        $this->crime = new Crime(new Factory());
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Crime::class, $this->crime);
    }

    public function testGenerate()
    {
        $reflection = new ReflectionClass($this->crime);
        $crimesProperty = $reflection->getProperty('crimes');
        $crimesProperty->setAccessible(true);
        $allCrimes = $crimesProperty->getValue($this->crime);

        for ($i = 0; $i < 10; $i++) {
            $generatedCrime = $this->crime->generate();

            $this->assertIsArray($generatedCrime);
            $this->assertArrayHasKey('crime', $generatedCrime);

            $crime = $generatedCrime['crime'];
            $this->assertIsString($crime);

            $found = false;
            foreach ($allCrimes as $crimeCategory) {
                if (in_array($crime, $crimeCategory)) {
                    $found = true;
                    break;
                }
            }

            $this->assertTrue($found, "Generated crime '{$crime}' not found in the list of crimes.");
        }
    }
}
