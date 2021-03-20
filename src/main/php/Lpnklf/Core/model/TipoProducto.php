<?php

namespace Lpnklf\Core\model;

use Cose\model\impl\Entity;

use Cose\utils\Logger;

/**
 * TipoProducto
 * 
 * @Entity @Table(name="lpnklf_tipo_producto")
 * 
 * @author Marcos
 */

class TipoProducto extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $nombre;
	
	
	/** @Column(type="boolean") **/
	private $servicioTecnico;
		
	public function __construct(){
	}
	
	public function __toString(){
		 return $this->getNombre();
	}


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
?>