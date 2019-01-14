<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testMainadmin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'admin/mainAdmin');
    }

}
