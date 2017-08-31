<?php

namespace AppBundle\Service;

use GuzzleHttp\Client;

class HttpClientService extends Client
{

    private $url;


    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getJsonFromUrl()
    {
        $httpResource = $this->get($this->url);
        return $httpResource->getBody()
                            ->getContents();
    }

}
