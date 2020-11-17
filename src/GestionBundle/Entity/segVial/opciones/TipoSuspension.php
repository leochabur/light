<?php

namespace GestionBundle\Entity\segVial\opciones;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoSuspension
 *
 * @ORM\Table(name="seg_vial_opciones_tipo_suspension")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\opciones\TipoSuspensionRepository")
 */
class TipoSuspension
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
     * @ORM\Column(name="tipo", type="string", length=255, unique=true)
     */
    private $tipo;

    public function __toString()
    {
        return strtoupper($this->tipo);
    }

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
     * @return TipoSuspension
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
