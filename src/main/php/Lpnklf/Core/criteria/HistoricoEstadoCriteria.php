<?php
namespace Lpnklf\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de HistoricoEstado
 *  
 * @author Marcos
 *
 */
class HistoricoEstadoCriteria extends Criteria{

	
	private $servicioTecnico;
	private $fechaDesde;
	private $fechaHasta;
	private $fechaDesdeDesde;
	private $fechaDesdeHasta;
	private $fechaHastaDesde;
	private $fechaHastaHasta;
	private $estado;
	private $user;
	private $fechaHastaNull;
	

	

	

	

	public function getFechaDesdeDesde()
	{
	    return $this->fechaDesdeDesde;
	}

	public function setFechaDesdeDesde($fechaDesdeDesde)
	{
	    $this->fechaDesdeDesde = $fechaDesdeDesde;
	}

	public function getFechaDesdeHasta()
	{
	    return $this->fechaDesdeHasta;
	}

	public function setFechaDesdeHasta($fechaDesdeHasta)
	{
	    $this->fechaDesdeHasta = $fechaDesdeHasta;
	}

	public function getFechaHastaDesde()
	{
	    return $this->fechaHastaDesde;
	}

	public function setFechaHastaDesde($fechaHastaDesde)
	{
	    $this->fechaHastaDesde = $fechaHastaDesde;
	}

	public function getFechaHastaHasta()
	{
	    return $this->fechaHastaHasta;
	}

	public function setFechaHastaHasta($fechaHastaHasta)
	{
	    $this->fechaHastaHasta = $fechaHastaHasta;
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

	public function getFechaHastaNull()
	{
	    return $this->fechaHastaNull;
	}

	public function setFechaHastaNull($fechaHastaNull)
	{
	    $this->fechaHastaNull = $fechaHastaNull;
	}
}