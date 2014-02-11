<?php

namespace RPPDb\RieselBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EditControllerTest extends WebTestCase
{
    public function testK()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/k/{k}');
    }

}
