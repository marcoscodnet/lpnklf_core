<?php

namespace Lpnklf\Core\Test\sucursals;

use Lpnklf\Core\model\Sucursal;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddSucursalsTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getSucursalService();
		
		\Logger::getLogger(__CLASS__)->info("agregando sucursal");		
		
		$sucursal = new Sucursal();
		$sucursal->setNombre("CASA MATRIZ");
		$service->add( $sucursal );
		
		
	}
}
?>