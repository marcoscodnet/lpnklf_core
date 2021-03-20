<?php

namespace Lpnklf\Core\Test\preventas;

use Lpnklf\Core\model\DetallePreventaRecurrente;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\model\PreventaRecurrente;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\PreventaRecurrenteCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class GenerarPreventasTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getPreventaRecurrenteService();
		
		\Logger::getLogger(__CLASS__)->info("generando preventas");		
		
		$this->persistenceContext->beginTransaction();
		
		$fecha = new \DateTime();
		$fecha->modify("+2 days");
		$service->generarPreventas( $fecha );
		
		
		$this->persistenceContext->commit();
	}
}
?>