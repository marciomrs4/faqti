<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * faqti
 *
 * @ORM\Table(name="faqti")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\faqtiRepository")
 */
class faqti
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
     * @ORM\Column(name="titulo", type="string", length=255)
     * @Assert\NotBlank(message="O campo Titulo é obrigatório")
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text")
     * @Assert\NotBlank(message="O campo Descrição é obrigatório")
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     * @Assert\NotBlank(message="O campo TAG é obrigatório")
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo", type="string", length=255)
     * @Assert\NotBlank(message="O campo Grupo é obrigatório")
     */
    private $grupo;


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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return faqti
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return faqti
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return faqti
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set grupo
     *
     * @param string $grupo
     *
     * @return faqti
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return string
     */
    public function getGrupo()
    {
        return $this->grupo;
    }
}

