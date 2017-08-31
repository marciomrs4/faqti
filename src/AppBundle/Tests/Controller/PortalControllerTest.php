<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortalControllerTest extends WebTestCase
{
    public function testHorarioscliente()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/horarios-clientes');
    }

    public function testQuotasostomia()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/quotas-ostomia');
    }

    public function testClientesparametrizacao()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/clientes-parametros');
    }

}
