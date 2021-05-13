<?php

namespace GestionBundle\Entity\segVial\eventos;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Infraccion
 *
 * @ORM\Table(name="seg_vial_eventos_infraccion")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\eventos\InfraccionRepository")
 */
class Infraccion extends Evento
{

    /**
     * @var string
     *
     * @ORM\Column(name="numeroActa", type="string", length=255)
     */
    private $numeroActa;

    /**
     * @var bool
     *
     * @ORM\Column(name="pagoVoluntario", type="boolean")
     */
    private $pagoVoluntario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vencimiento", type="datetime")
     */
    private $vencimiento;

    /**
     * @var float
     *
     * @ORM\Column(name="pagoTotal", type="float")
     */
    private $pagoTotal;

    /**
     * @ORM\ManyToOne(targetEntity="TipoInfraccion")
     * @ORM\JoinColumn(name="id_tipo_infraccion", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipoInfraccion;

    /**
     * Set numeroActa
     *
     * @param string $numeroActa
     *
     * @return Infraccion
     */
    public function setNumeroActa($numeroActa)
    {
        $this->numeroActa = $numeroActa;

        return $this;
    }

    /**
     * Get numeroActa
     *
     * @return string
     */
    public function getNumeroActa()
    {
        return $this->numeroActa;
    }

    /**
     * Set pagoVoluntario
     *
     * @param boolean $pagoVoluntario
     *
     * @return Infraccion
     */
    public function setPagoVoluntario($pagoVoluntario)
    {
        $this->pagoVoluntario = $pagoVoluntario;

        return $this;
    }

    /**
     * Get pagoVoluntario
     *
     * @return bool
     */
    public function getPagoVoluntario()
    {
        return $this->pagoVoluntario;
    }

    /**
     * Set vencimiento
     *
     * @param \DateTime $vencimiento
     *
     * @return Infraccion
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;

        return $this;
    }

    /**
     * Get vencimiento
     *
     * @return \DateTime
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * Set pagoTotal
     *
     * @param float $pagoTotal
     *
     * @return Infraccion
     */
    public function setPagoTotal($pagoTotal)
    {
        $this->pagoTotal = $pagoTotal;

        return $this;
    }

    /**
     * Get pagoTotal
     *
     * @return float
     */
    public function getPagoTotal()
    {
        return $this->pagoTotal;
    }

    /**
     * Set tipoInfraccion
     *
     * @param \GestionBundle\Entity\segVial\eventos\TipoInfraccion $tipoInfraccion
     *
     * @return Infraccion
     */
    public function setTipoInfraccion(\GestionBundle\Entity\segVial\eventos\TipoInfraccion $tipoInfraccion = null)
    {
        $this->tipoInfraccion = $tipoInfraccion;

        return $this;
    }

    /**
     * Get tipoInfraccion
     *
     * @return \GestionBundle\Entity\segVial\eventos\TipoInfraccion
     */
    public function getTipoInfraccion()
    {
        return $this->tipoInfraccion;
    }
}
