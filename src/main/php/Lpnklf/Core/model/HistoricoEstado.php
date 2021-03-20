<?php

namespace Lpnklf\Core\model;

use Cose\model\impl\Entity;


use Cose\utils\Logger;

/**
 * HistoricoEstado
 * 
 * @Entity @Table(name="lpnklf_historico_estado")
 * 
 * @author Marcos
 */

class HistoricoEstado extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="datetime")
	 * @var \Datetime
	 */
	private $fechaDesde;
	
	/**
	 * @Column(type="datetime", nullable=true)
	 * @var \Datetime
	 */
	private $fechaHasta;
	
	
	/**
	 * @Column(type="integer", nullable=true)
	 * @var unknown_type
	 */
    private $prioridad;
	
	
	
	/**
     * @ManyToOne(targetEntity="Lpnklf\Core\model\ServicioTecnico",cascade={"detach"})
     * @JoinColumn(name="servicioTecnico_oid", referencedColumnName="oid")
     * 
     * servicio tecnico del historico
     **/
    private $servicioTecnico;
    
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
	 * @var float
	 */
	private $monto;
    
    /**
     * @ManyToOne(targetEntity="Lpnklf\Core\model\Estado",cascade={"detach"})
     * @JoinColumn(name="estado_oid", referencedColumnName="oid")
     * 
     * estado del historico
     **/
    private $estado;
    
    /**
	 * @Column(type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
	 * @var \Datetime
	 */
	private $ultModificacion;
	
	/**
     * @ManyToOne(targetEntity="Cose\Security\model\User",cascade={"detach"})
     * @JoinColumn(name="user_oid", referencedColumnName="oid")
     * 
     * usuario que crea el estado
     **/
    private $user;
    
    
	public function __construct(){
	}
	
	public function __toString(){
		 return "";
	}


	

	

	public function getFechaDesde()
	{
	    return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde)
	{
	    $this->fechaDesde = $fechaDesde;
	}

	public function getFechaHasta()
	{
	    return $this->fechaHasta;
	}

	public function setFechaHasta($fechaHasta)
	{
	    $this->fechaHasta = $fechaHasta;
	}



	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	

	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}

	public function getServicioTecnico()
	{
	    return $this->servicioTecnico;
	}

	public function setServicioTecnico($servicioTecnico)
	{
	    $this->servicioTecnico = $servicioTecnico;
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

	public function getMonto()
	{
	    return $this->monto;
	}

	public function setMonto($monto)
	{
	    $this->monto = $monto;
	}

	public function getUltModificacion()
	{
	    return $this->ultModificacion;
	}

	public function setUltModificacion($ultModificacion)
	{
	    $this->ultModificacion = $ultModificacion;
	}

	public function getPrioridad()
	{
	    return $this->prioridad;
	}

	public function setPrioridad($prioridad)
	{
	    $this->prioridad = $prioridad;
	}
}
?>