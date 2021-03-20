<?php
namespace Lpnklf\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de Estado
 *  
 * @author Marcos
 *
 */
class EstadoCriteria extends Criteria{

	private $nombre;
	
	
	

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	
}