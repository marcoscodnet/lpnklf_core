<?php
namespace Lpnklf\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de tipoProducto
 *  
 * @author Marcos
 *
 */
class TipoProductoCriteria extends Criteria{

	private $nombre;
	
	private $servicioTecnico;
	

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	

	public function getServicioTecnico()
	{
	    return $this->servicioTecnico;
	}

	public function setServicioTecnico($servicioTecnico)
	{
	    $this->servicioTecnico = $servicioTecnico;
	}
}