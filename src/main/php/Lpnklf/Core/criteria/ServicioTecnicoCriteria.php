<?php
namespace Lpnklf\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de ServicioTecnico
 *  
 * @author Marcos
 *
 */
class ServicioTecnicoCriteria extends Criteria{

	private $fecha;
	private $fechaDesde;
	private $fechaHasta;
	private $cliente;
	private $tipoProducto;
	private $marcaProducto;
	private $prioridad;
	private $modelo;
	private $estados;
	
	private $estadoNotEqual;
	
	private $estado;
	
	
	

	

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
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

	public function getPrioridad()
	{
	    return $this->prioridad;
	}

	public function setPrioridad($prioridad)
	{
	    $this->prioridad = $prioridad;
	}

	public function getModelo()
	{
	    return $this->modelo;
	}

	public function setModelo($modelo)
	{
	    $this->modelo = $modelo;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getEstados()
	{
	    return $this->estados;
	}

	public function setEstados($estados)
	{
	    $this->estados = $estados;
	}

	public function getEstadoNotEqual()
	{
	    return $this->estadoNotEqual;
	}

	public function setEstadoNotEqual($estadoNotEqual)
	{
	    $this->estadoNotEqual = $estadoNotEqual;
	}
}