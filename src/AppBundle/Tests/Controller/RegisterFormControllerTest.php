<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterFormControllerTest extends WebTestCase
{
    public function testRegisterform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/registerForm');
    }

}
