<?php

namespace Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PokemonControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request("GET", "/login");
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}