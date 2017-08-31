<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PortalController extends Controller
{

    private function dataFromUrl($urlFromAction)
    {
        $urlParameter = $this->get('service_container')->getParameter('url_rest_service');

        $httpCliente = $this->get('http.client');

        $httpCliente->setUrl($urlParameter.$urlFromAction);

        return json_decode($httpCliente->getJsonFromUrl());
    }

    /**
     * @Route("/horarios-clientes")
     * @Method("GET")
     */
    public function horariosClienteAction()
    {

        $horariosClientes = $this->dataFromUrl('portal/horarios/json');

        return $this->render('AppBundle:Portal:horarios_cliente.html.twig', array(
            'horariosClientes' => $horariosClientes
        ));
    }

    /**
     * @Route("/quotas-ostomia")
     * @Method("GET")
     */
    public function quotasOstomiaAction()
    {
        $ostomiaEstoque = $this->dataFromUrl('portal/quotas/json');

        return $this->render('AppBundle:Portal:quotas_ostomia.html.twig', array(
            'ostomiaEstoque' => $ostomiaEstoque
        ));
    }

    /**
     * @Route("/clientes-parametros")
     * @Method("GET")
     */
    public function clientesParametrizacaoAction()
    {
        $clientesParameters = $this->dataFromUrl('portal/clientes/json');

        return $this->render('AppBundle:Portal:clientes_parametrizacao.html.twig', array(
            'clientesParameters' => $clientesParameters
        ));
    }

}
