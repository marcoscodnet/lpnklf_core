<?php

namespace Lpnklf\Core\Test\ventas;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AnularVentaTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getVentaService();
		
		\Logger::getLogger(__CLASS__)->info("anulando");		
		
		$venta = $service->get( 62  );
		
		$service->anular($venta, LpnklfUtils::getUserByUsername("bernardo"));
		
		
	}
}
?>