<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SendEmailOCControllerTest extends WebTestCase
{
    public function testSendmail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/sendmail');
    }

}
