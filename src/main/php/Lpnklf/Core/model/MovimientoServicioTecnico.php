<?php

namespace Lpnklf\Core\model;

use Cose\model\impl\Entity;

use Cose\utils\Logger;

/**
 * Movimiento de cuenta por servicio tecnico
 * 
 * @Entity
 * 
 * @author Marcos
 * @since 04-04-2018
 */

class MovimientoServicioTecnico extends MovimientoCaja{

	//variables de instancia.

	/**
     * @ManyToOne(targetEntity="ServicioTecnico",cascade={"merge"})
     * @JoinColumn(name="servicioTecnico_oid", referencedColumnName="oid", nullable=true)
     * @var ServicioTecnico
     **/
	private $servicioTecnico;

	
	
	public function __construct(){
	}
	
	public function __toString(){
		 return  $this->getFechaHora()->format("d/m/Y H:i:s") . " servicio tecnico #" . $this->getServicioTecnico()->getOid() . " h:" . $this->getHaber() . " d:" . $this->getDebe(). " s:" . $this->getSaldo();
	}


	
	
	protected function buildInstance(){
		return new MovimientoServicioTecnico();
	}
	
	public function buildContramovimiento(){

		$movimiento = parent::buildContramovimiento();
		$movimiento->setServicioTecnico( $this->getServicioTecnico() );

		return $movimiento;
	}

	public  function podesAnularte(){
		
		return $this->getServicioTecnico()->podesAnularte();
		
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