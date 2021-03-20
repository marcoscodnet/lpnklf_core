<?php
namespace Lpnklf\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de MovimientoServicioTecnico
 *  
 * @author Marcos
 * @since 04-04-2018
 *
 */
class MovimientoServicioTecnicoCriteria extends MovimientoCajaCriteria{

	private $servicioTecnico;

	

	public function getServicioTecnico()
	{
	    return $this->servicioTecnico;
	}

	public function setServicioTecnico($servicioTecnico)
	{
	    $this->servicioTecnico = $servicioTecnico;
	}
}