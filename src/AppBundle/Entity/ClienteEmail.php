<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClienteEmail
 *
 * @ORM\Table(name="cliente_email")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClienteEmailRepository")
 */
class ClienteEmail
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", length=255, unique=true)
     */
    private $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="emails", type="text")
     */
    private $emails;

    /**
     * @var string
     *
     * @ORM\Column(name="mensagem", type="text")
     */
    private $mensagem;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cliente
     *
     * @param string $cliente
     *
     * @return ClienteEmail
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set emails
     *
     * @param string $emails
     *
     * @return ClienteEmail
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;

        return $this;
    }

    /**
     * Get emails
     *
     * @return string
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Set mensagem
     *
     * @param string $mensagem
     *
     * @return ClienteEmail
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Get mensagem
     *
     * @return string
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }
}
