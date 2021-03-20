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

class BorrarPreventaRecurrenteTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getPreventaRecurrenteService();
		
		\Logger::getLogger(__CLASS__)->info("borrando PreventaRecurrente");		
		
		$this->persistenceContext->beginTransaction();
		
		$service->delete( 5 );
		
		
		$this->persistenceContext->commit();
	}
}
?>