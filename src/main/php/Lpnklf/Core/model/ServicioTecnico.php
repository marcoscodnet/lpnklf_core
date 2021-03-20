<?php

namespace Lpnklf\Core\model;

use Cose\model\impl\Entity;


use Cose\utils\Logger;

/**
 * ServicioTecnico
 * 
 * @Entity @Table(name="lpnklf_servicio_tecnico")
 * 
 * @author Marcos
 */

class ServicioTecnico extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="datetime")
	 * @var \Datetime
	 */
	private $fecha;
	
	
	
	/**
	 * @Column(type="integer", nullable=true)
	 * @var unknown_type
	 */
    private $prioridad;
    
    /**
     * @ManyToOne(targetEntity="Lpnklf\Core\model\Cliente",cascade={"detach"})
     * @JoinColumn(name="cliente_oid", referencedColumnName="oid")
     * 
     * cliente del servicio tecnico
     **/
    private $cliente;
    
    /**
     * @ManyToOne(targetEntity="Lpnklf\Core\model\TipoProducto",cascade={"detach"})
     * @JoinColumn(name="tipoProducto_oid", referencedColumnName="oid")
     * 
     * tipo de dispositivo del servicio tecnico
     **/
    private $tipoProducto;
    
    /**
     * @ManyToOne(targetEntity="Lpnklf\Core\model\MarcaProducto",cascade={"detach"})
     * @JoinColumn(name="marcaProducto_oid", referencedColumnName="oid")
     * 
     * marca de dispositivo del servicio tecnico
     **/
    private $marcaProducto;
    
    /**
	 * @Column(type="string", length=50)
	 */
	private $modelo;
	
	/**
	 * @Column(type="text", nullable=true)
	 * @var string
	 */
	private $detalleFalla;
	
	/**
	 * @Column(type="string", length=20)
	 */
	private $fuente;
	
	/**
	 * @Column(type="string", length=20)
	 */
	private $bateria;
	
	/**
	 * @Column(type="string", length=20)
	 */
	private $clave;
	
	/**
	 * @Column(type="text", nullable=true)
	 * @var string
	 */
	private $observaciones;
	
	/**
	 * @Column(type="integer", nullable=true)
	 * 
	 */
	private $diasDemora;
	
	
	/**
	 * @Column(type="float", nullable=true)
	 * 
	 */
	private $reparaHasta;
	
	/**
	 * @Column(type="float", nullable=true)
	 * @var float
	 */
	private $monto;
	
	/**
	 * @Column(type="float", nullable=true)
	 * @var float
	 */
	private $montoPagado;

	
	/**
	 * @Column(type="float", nullable=true)
	 * @var float
	 */
	private $montoDebe;
	
	/**
	 * @Column(type="text", nullable=true)
	 * @var string
	 */
	private $diagnostico;
	
	/**
	 * @Column(type="text", nullable=true)
	 * @var string
	 */
	private $solucion;
	
	/**
	 * @Column(type="integer")
	 * @var EstadoVenta
	 */
	private $estado;
	
	/**
     * @ManyToOne(targetEntity="Lpnklf\Core\model\Estado",cascade={"detach"})
     * @JoinColumn(name="estadoServicio_oid", referencedColumnName="oid")
     * 
     * estadoServicio
     **/
	private $estadoServicio;
		
	public function __construct(){
	}
	
	public function __toString(){
		$cliente =  (!($this->getCliente()))?$this->getCliente()->getNombre():" ";
		
		return $this->getTipoProducto()->getNombre()." - ".$this->getMarcaProducto()->getNombre()." - ".$cliente." - Nro: ".$this->getOid();
	}


	

	

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}

	public function getPrioridad()
	{
	    return $this->prioridad;
	}

	public function setPrioridad($prioridad)
	{
	    $this->prioridad = $prioridad;
	}

	public function getCliente()
	{
	    return $this->cliente;
	}

	public function setCliente($cliente)
	{
	    $this->cliente = $cliente;
	}

	public function getTipoProducto()
	{
	    return $this->tipoProducto;
	}

	public function setTipoProducto($tipoProducto)
	{
	    $this->tipoProducto = $tipoProducto;
	}

	public function getMarcaProducto()
	{
	    return $this->marcaProducto;
	}

	public function setMarcaProducto($marcaProducto)
	{
	    $this->marcaProducto = $marcaProducto;
	}

	public function getModelo()
	{
	    return $this->modelo;
	}

	public function setModelo($modelo)
	{
	    $this->modelo = $modelo;
	}

	public function getDetalleFalla()
	{
	    return $this->detalleFalla;
	}

	public function setDetalleFalla($detalleFalla)
	{
	    $this->detalleFalla = $detalleFalla;
	}

	public function getFuente()
	{
	    return $this->fuente;
	}

	public function setFuente($fuente)
	{
	    $this->fuente = $fuente;
	}

	public function getBateria()
	{
	    return $this->bateria;
	}

	public function setBateria($bateria)
	{
	    $this->bateria = $bateria;
	}

	public function getClave()
	{
	    return $this->clave;
	}

	public function setClave($clave)
	{
	    $this->clave = $clave;
	}

	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}

	public function getDiasDemora()
	{
	    return $this->diasDemora;
	}

	public function setDiasDemora($diasDemora)
	{
	    $this->diasDemora = $diasDemora;
	}

	public function getReparaHasta()
	{
	    return $this->reparaHasta;
	}

	public function setReparaHasta($reparaHasta)
	{
	    $this->reparaHasta = $reparaHasta;
	}

	public function getDiagnostico()
	{
	    return $this->diagnostico;
	}

	public function setDiagnostico($diagnostico)
	{
	    $this->diagnostico = $diagnostico;
	}

	public function getSolucion()
	{
	    return $this->solucion;
	}

	public function setSolucion($solucion)
	{
	    $this->solucion = $solucion;
	}
	
	public  function podesAnularte(){
		
		return $this->getEstado() != EstadoVenta::Anulada;
		
	}
	
	public  function podesCobrarte(){
		
		return ($this->getEstado() != EstadoVenta::Anulada) && ($this->getEstado() != EstadoVenta::Pagada);
		
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getMonto()
	{
	    return $this->monto;
	}

	public function setMonto($monto)
	{
	    $this->monto = $monto;
	}

	public function getMontoPagado()
	{
	    return $this->montoPagado;
	}

	public function setMontoPagado($montoPagado)
	{
	    $this->montoPagado = $montoPagado;
	}

	public function getMontoDebe()
	{
	    return $this->montoDebe;
	}

	public function setMontoDebe($montoDebe)
	{
	    $this->montoDebe = $montoDebe;
	}

	public function getEstadoServicio()
	{
	    return $this->estadoServicio;
	}

	public function setEstadoServicio($estadoServicio)
	{
	    $this->estadoServicio = $estadoServicio;
	}
}
?>