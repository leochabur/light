<?php

namespace GestionBundle\Entity\segVial\eventos;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UbicacionEvento
 *
 * @ORM\Table(name="seg_vial_eventos_ubicacion_evento")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\eventos\UbicacionEventoRepository")
 */
class UbicacionEvento
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
     * @ORM\Column(name="calle", type="string", length=255)
     */
    private $calle;

    /**
     * @var string
     *
     * @ORM\Column(name="interseccion", type="string", length=255)
     */
    private $interseccion;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="float")
     */
    private $latitud;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float")
     */
    private $longitud;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Ciudad")
     * @ORM\JoinColumn(name="id_ciudad", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $ciudad;

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
     * Set calle
     *
     * @param string $calle
     *
     * @return UbicacionEvento
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set interseccion
     *
     * @param string $interseccion
     *
     * @return UbicacionEvento
     */
    public function setInterseccion($interseccion)
    {
        $this->interseccion = $interseccion;

        return $this;
    }

    /**
     * Get interseccion
     *
     * @return string
     */
    public function getInterseccion()
    {
        return $this->interseccion;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     *
     * @return UbicacionEvento
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     *
     * @return UbicacionEvento
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set ciudad
     *
     * @param \GestionBundle\Entity\ventas\Ciudad $ciudad
     *
     * @return UbicacionEvento
     */
    public function setCiudad(\GestionBundle\Entity\ventas\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \GestionBundle\Entity\ventas\Ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }
}
