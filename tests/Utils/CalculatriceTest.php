<?php

namespace Tests\Utils;

use App\Utils\Calculatrice;
use PHPUnit\Framework\TestCase;

class CalculatriceTest extends TestCase
{
    public function testSquare()
    {
        $calculatrice = new Calculatrice();
        $result = $calculatrice->square(5);
        $this->assertEquals(25, $result);
    }
}