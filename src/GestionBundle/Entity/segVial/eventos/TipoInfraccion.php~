<?php

namespace GestionBundle\Entity\segVial\eventos;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoInfraccion
 *
 * @ORM\Table(name="seg_vialeventos_tipo_infraccion")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\eventos\TipoInfraccionRepository")
 */
class TipoInfraccion
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
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;


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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TipoInfraccion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
