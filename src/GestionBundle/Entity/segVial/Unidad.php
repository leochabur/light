<?php

namespace GestionBundle\Entity\segVial;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Unidad
 *
 * @ORM\Table(name="seg_vial_unidades")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\UnidadRepository")
 * @UniqueEntity(
 *     fields={"interno", "propietario"},
 *     errorPath="interno",
 *     message="Interno existente para el propietario!"
 * )
 */
class Unidad
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
     * @var int
     *
     * @ORM\Column(name="interno", type="integer")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $interno;

    /**
     * @var string
     *
     * @ORM\Column(name="chasisMarca", type="string", length=255, nullable=true)
     */
    private $chasisMarca;

    /**
     * @var string
     *
     * @ORM\Column(name="chasisModelo", type="string", length=255, nullable=true)
     */
    private $chasisModelo;

    /**
     * @var string
     *
     * @ORM\Column(name="chasisNumero", type="string", length=255, nullable=true)
     */
    private $chasisNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="carroceriaMarca", type="string", length=255, nullable=true)
     */
    private $carroceriaMarca;

    /**
     * @var string
     *
     * @ORM\Column(name="carroceriaModelo", type="string", length=255, nullable=true)
     */
    private $carroceriaModelo;

    /**
     * @var int
     *
     * @ORM\Column(name="capacidadReal", type="integer", nullable=true)
     */
    private $capacidadReal;

    /**
     * @var int
     *
     * @ORM\Column(name="capacidadCNRT", type="integer", nullable=true)
     */
    private $capacidadCNRT;

    /**
     * @var string
     *
     * @ORM\Column(name="motorMarca", type="string", length=255, nullable=true)
     */
    private $motorMarca;

    /**
     * @var string
     *
     * @ORM\Column(name="motorNumero", type="string", length=255, nullable=true)
     */
    private $motorNumero;

    /**
     * @var float
     *
     * @ORM\Column(name="consumo", type="float", nullable=true)
     */
    private $consumo;

    /**
     * @var bool
     *
     * @ORM\Column(name="audioVideo", type="boolean", nullable=true)
     */
    private $audioVideo;

    /**
     * @var bool
     *
     * @ORM\Column(name="banio", type="boolean", nullable=true)
     */
    private $banio;

    /**
     * @var bool
     *
     * @ORM\Column(name="bar", type="boolean", nullable=true)
     */
    private $bar;

    /**
     * @var string
     *
     * @ORM\Column(name="dominioAnterior", type="string", length=7, nullable=true)
     */
    private $dominioAnterior;

    /**
     * @var string
     *
     * @ORM\Column(name="dominioNuevo", type="string", length=9, nullable=true)
     */
    private $dominioNuevo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInscripcion", type="date", nullable=true)
     */
    private $fechaInscripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="anioModelo", type="integer", nullable=true)
     */
    private $anioModelo;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var bool
     *
     * @ORM\Column(name="ploteo", type="boolean", nullable=true)
     */
    private $ploteo;

    /**
     * @var bool
     *
     * @ORM\Column(name="carteleraElectronica", type="boolean", nullable=true)
     */
    private $carteleraElectronica;

    /**
     * @var float
     *
     * @ORM\Column(name="capacidadTanque", type="integer", nullable=true)
     */
    private $capacidadTanque;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidadTanques", type="integer", nullable=true)
     */
    private $cantidadTanques;

    /**
     * @var bool
     *
     * @ORM\Column(name="pcABordo", type="boolean", nullable=true)
     */
    private $pcABordo;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\rrhh\Propietario")
     * @ORM\JoinColumn(name="id_propietario", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $propietario;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\TipoUnidad")
     * @ORM\JoinColumn(name="id_tipo_unidad", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipoUnidad;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\TipoMotor")
     * @ORM\JoinColumn(name="id_tipo_motor", referencedColumnName="id", nullable=true)
     */
    private $tipoMotor;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\CalidadUnidad")
     * @ORM\JoinColumn(name="id_calidad_unidad", referencedColumnName="id", nullable=true)
     */
    private $calidadUnidad;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Provincia")
     * @ORM\JoinColumn(name="id_radicacion", referencedColumnName="id", nullable=true)
     */
    private $radicacion;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad")
     * @ORM\JoinTable(name="seg_vial_habilitaciones_unidades",
     *      joinColumns={@ORM\JoinColumn(name="id_unidad", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_tipo_habilitacion", referencedColumnName="id")}
     *      )
     */
    private $habilitaciones;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", options={"default": true})
     */
    private $activo = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="confirmado", type="boolean")
     */
    private $confirmado = false;

    /**
     * @Assert\Callback
     */
    public function isValidDomain(ExecutionContextInterface $context, $payload)
    {
        if  (!($this->dominioAnterior || $this->dominioNuevo))
        {
            $context->buildViolation('Alguno de los campos correspondientes al Dominio debe estar completo')
                ->atPath('dominioAnterior')
                ->addViolation();
        }
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set interno
     *
     * @param integer $interno
     *
     * @return Unidad
     */
    public function setInterno($interno)
    {
        $this->interno = $interno;

        return $this;
    }

    /**
     * Get interno
     *
     * @return integer
     */
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * Set chasisMarca
     *
     * @param string $chasisMarca
     *
     * @return Unidad
     */
    public function setChasisMarca($chasisMarca)
    {
        $this->chasisMarca = $chasisMarca;

        return $this;
    }

    /**
     * Get chasisMarca
     *
     * @return string
     */
    public function getChasisMarca()
    {
        return $this->chasisMarca;
    }

    /**
     * Set chasisModelo
     *
     * @param string $chasisModelo
     *
     * @return Unidad
     */
    public function setChasisModelo($chasisModelo)
    {
        $this->chasisModelo = $chasisModelo;

        return $this;
    }

    /**
     * Get chasisModelo
     *
     * @return string
     */
    public function getChasisModelo()
    {
        return $this->chasisModelo;
    }

    /**
     * Set chasisNumero
     *
     * @param string $chasisNumero
     *
     * @return Unidad
     */
    public function setChasisNumero($chasisNumero)
    {
        $this->chasisNumero = $chasisNumero;

        return $this;
    }

    /**
     * Get chasisNumero
     *
     * @return string
     */
    public function getChasisNumero()
    {
        return $this->chasisNumero;
    }

    /**
     * Set carroceriaMarca
     *
     * @param string $carroceriaMarca
     *
     * @return Unidad
     */
    public function setCarroceriaMarca($carroceriaMarca)
    {
        $this->carroceriaMarca = $carroceriaMarca;

        return $this;
    }

    /**
     * Get carroceriaMarca
     *
     * @return string
     */
    public function getCarroceriaMarca()
    {
        return $this->carroceriaMarca;
    }

    /**
     * Set carroceriaModelo
     *
     * @param string $carroceriaModelo
     *
     * @return Unidad
     */
    public function setCarroceriaModelo($carroceriaModelo)
    {
        $this->carroceriaModelo = $carroceriaModelo;

        return $this;
    }

    /**
     * Get carroceriaModelo
     *
     * @return string
     */
    public function getCarroceriaModelo()
    {
        return $this->carroceriaModelo;
    }

    /**
     * Set capacidadReal
     *
     * @param integer $capacidadReal
     *
     * @return Unidad
     */
    public function setCapacidadReal($capacidadReal)
    {
        $this->capacidadReal = $capacidadReal;

        return $this;
    }

    /**
     * Get capacidadReal
     *
     * @return integer
     */
    public function getCapacidadReal()
    {
        return $this->capacidadReal;
    }

    /**
     * Set capacidadCNRT
     *
     * @param integer $capacidadCNRT
     *
     * @return Unidad
     */
    public function setCapacidadCNRT($capacidadCNRT)
    {
        $this->capacidadCNRT = $capacidadCNRT;

        return $this;
    }

    /**
     * Get capacidadCNRT
     *
     * @return integer
     */
    public function getCapacidadCNRT()
    {
        return $this->capacidadCNRT;
    }

    /**
     * Set motorMarca
     *
     * @param string $motorMarca
     *
     * @return Unidad
     */
    public function setMotorMarca($motorMarca)
    {
        $this->motorMarca = $motorMarca;

        return $this;
    }

    /**
     * Get motorMarca
     *
     * @return string
     */
    public function getMotorMarca()
    {
        return $this->motorMarca;
    }

    /**
     * Set motorNumero
     *
     * @param string $motorNumero
     *
     * @return Unidad
     */
    public function setMotorNumero($motorNumero)
    {
        $this->motorNumero = $motorNumero;

        return $this;
    }

    /**
     * Get motorNumero
     *
     * @return string
     */
    public function getMotorNumero()
    {
        return $this->motorNumero;
    }

    /**
     * Set consumo
     *
     * @param float $consumo
     *
     * @return Unidad
     */
    public function setConsumo($consumo)
    {
        $this->consumo = $consumo;

        return $this;
    }

    /**
     * Get consumo
     *
     * @return float
     */
    public function getConsumo()
    {
        return $this->consumo;
    }

    /**
     * Set audioVideo
     *
     * @param boolean $audioVideo
     *
     * @return Unidad
     */
    public function setAudioVideo($audioVideo)
    {
        $this->audioVideo = $audioVideo;

        return $this;
    }

    /**
     * Get audioVideo
     *
     * @return boolean
     */
    public function getAudioVideo()
    {
        return $this->audioVideo;
    }

    /**
     * Set banio
     *
     * @param boolean $banio
     *
     * @return Unidad
     */
    public function setBanio($banio)
    {
        $this->banio = $banio;

        return $this;
    }

    /**
     * Get banio
     *
     * @return boolean
     */
    public function getBanio()
    {
        return $this->banio;
    }

    /**
     * Set bar
     *
     * @param boolean $bar
     *
     * @return Unidad
     */
    public function setBar($bar)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get bar
     *
     * @return boolean
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set dominioAnterior
     *
     * @param string $dominioAnterior
     *
     * @return Unidad
     */
    public function setDominioAnterior($dominioAnterior)
    {
        $this->dominioAnterior = $dominioAnterior;

        return $this;
    }

    /**
     * Get dominioAnterior
     *
     * @return string
     */
    public function getDominioAnterior()
    {
        return $this->dominioAnterior;
    }

    /**
     * Set dominioNuevo
     *
     * @param string $dominioNuevo
     *
     * @return Unidad
     */
    public function setDominioNuevo($dominioNuevo)
    {
        $this->dominioNuevo = $dominioNuevo;

        return $this;
    }

    /**
     * Get dominioNuevo
     *
     * @return string
     */
    public function getDominioNuevo()
    {
        return $this->dominioNuevo;
    }

    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     *
     * @return Unidad
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;

        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \DateTime
     */
    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set anioModelo
     *
     * @param integer $anioModelo
     *
     * @return Unidad
     */
    public function setAnioModelo($anioModelo)
    {
        $this->anioModelo = $anioModelo;

        return $this;
    }

    /**
     * Get anioModelo
     *
     * @return integer
     */
    public function getAnioModelo()
    {
        return $this->anioModelo;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Unidad
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set ploteo
     *
     * @param boolean $ploteo
     *
     * @return Unidad
     */
    public function setPloteo($ploteo)
    {
        $this->ploteo = $ploteo;

        return $this;
    }

    /**
     * Get ploteo
     *
     * @return boolean
     */
    public function getPloteo()
    {
        return $this->ploteo;
    }

    /**
     * Set carteleraElectronica
     *
     * @param boolean $carteleraElectronica
     *
     * @return Unidad
     */
    public function setCarteleraElectronica($carteleraElectronica)
    {
        $this->carteleraElectronica = $carteleraElectronica;

        return $this;
    }

    /**
     * Get carteleraElectronica
     *
     * @return boolean
     */
    public function getCarteleraElectronica()
    {
        return $this->carteleraElectronica;
    }

    /**
     * Set capacidadTanque
     *
     * @param float $capacidadTanque
     *
     * @return Unidad
     */
    public function setCapacidadTanque($capacidadTanque)
    {
        $this->capacidadTanque = $capacidadTanque;

        return $this;
    }

    /**
     * Get capacidadTanque
     *
     * @return float
     */
    public function getCapacidadTanque()
    {
        return $this->capacidadTanque;
    }

    /**
     * Set cantidadTanques
     *
     * @param integer $cantidadTanques
     *
     * @return Unidad
     */
    public function setCantidadTanques($cantidadTanques)
    {
        $this->cantidadTanques = $cantidadTanques;

        return $this;
    }

    /**
     * Get cantidadTanques
     *
     * @return integer
     */
    public function getCantidadTanques()
    {
        return $this->cantidadTanques;
    }

    /**
     * Set pcABordo
     *
     * @param boolean $pcABordo
     *
     * @return Unidad
     */
    public function setPcABordo($pcABordo)
    {
        $this->pcABordo = $pcABordo;

        return $this;
    }

    /**
     * Get pcABordo
     *
     * @return boolean
     */
    public function getPcABordo()
    {
        return $this->pcABordo;
    }

    /**
     * Set propietario
     *
     * @param \GestionBundle\Entity\rrhh\Propietario $propietario
     *
     * @return Unidad
     */
    public function setPropietario(\GestionBundle\Entity\rrhh\Propietario $propietario = null)
    {
        $this->propietario = $propietario;

        return $this;
    }

    /**
     * Get propietario
     *
     * @return \GestionBundle\Entity\rrhh\Propietario
     */
    public function getPropietario()
    {
        return $this->propietario;
    }

    /**
     * Set tipoUnidad
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidad
     *
     * @return Unidad
     */
    public function setTipoUnidad(\GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidad = null)
    {
        $this->tipoUnidad = $tipoUnidad;

        return $this;
    }

    /**
     * Get tipoUnidad
     *
     * @return \GestionBundle\Entity\segVial\opciones\TipoUnidad
     */
    public function getTipoUnidad()
    {
        return $this->tipoUnidad;
    }

    /**
     * Set tipoMotor
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoMotor $tipoMotor
     *
     * @return Unidad
     */
    public function setTipoMotor(\GestionBundle\Entity\segVial\opciones\TipoMotor $tipoMotor = null)
    {
        $this->tipoMotor = $tipoMotor;

        return $this;
    }

    /**
     * Get tipoMotor
     *
     * @return \GestionBundle\Entity\segVial\opciones\TipoMotor
     */
    public function getTipoMotor()
    {
        return $this->tipoMotor;
    }

    /**
     * Set calidadUnidad
     *
     * @param \GestionBundle\Entity\segVial\opciones\CalidadUnidad $calidadUnidad
     *
     * @return Unidad
     */
    public function setCalidadUnidad(\GestionBundle\Entity\segVial\opciones\CalidadUnidad $calidadUnidad = null)
    {
        $this->calidadUnidad = $calidadUnidad;

        return $this;
    }

    /**
     * Get calidadUnidad
     *
     * @return \GestionBundle\Entity\segVial\opciones\CalidadUnidad
     */
    public function getCalidadUnidad()
    {
        return $this->calidadUnidad;
    }

    /**
     * Set radicacion
     *
     * @param \GestionBundle\Entity\ventas\Provincia $radicacion
     *
     * @return Unidad
     */
    public function setRadicacion(\GestionBundle\Entity\ventas\Provincia $radicacion = null)
    {
        $this->radicacion = $radicacion;

        return $this;
    }

    /**
     * Get radicacion
     *
     * @return \GestionBundle\Entity\ventas\Provincia
     */
    public function getRadicacion()
    {
        return $this->radicacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->habilitaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add habilitacione
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione
     *
     * @return Unidad
     */
    public function addHabilitacione(\GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione)
    {
        $this->habilitaciones[] = $habilitacione;

        return $this;
    }

    /**
     * Remove habilitacione
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione
     */
    public function removeHabilitacione(\GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione)
    {
        $this->habilitaciones->removeElement($habilitacione);
    }

    /**
     * Get habilitaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHabilitaciones()
    {
        return $this->habilitaciones;
    }

    public function getDominio()
    {
        $dominio = '';
        if ($this->dominioAnterior)
        {
            $dominio = substr($this->dominioAnterior, 0, 3).'-'.substr($this->dominioAnterior, 3);
        }
        elseif ($this->dominioNuevo)
        {
            $dominio = substr($this->dominioNuevo, 0, 2).'-'.substr($this->dominioNuevo, 2, 3).'-'.substr($this->dominioNuevo, 5);
        }
        return strtoupper($dominio);
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Unidad
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set confirmado
     *
     * @param boolean $confirmado
     *
     * @return Unidad
     */
    public function setConfirmado($confirmado)
    {
        $this->confirmado = $confirmado;

        return $this;
    }

    /**
     * Get confirmado
     *
     * @return boolean
     */
    public function getConfirmado()
    {
        return $this->confirmado;
    }
}
