<?php

namespace Lpnklf\Core\Test\sucursales;

use Lpnklf\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

use Lpnklf\Core\Test\GenericTest;
use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\ClienteCriteria;

use Cose\Security\service\SecurityContext;

class ListClientesTest extends GenericTest{
	
	/**
	 * @Security( permission="listar_sucursales" )
	 */
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getSucursalService();
		
		$this->log("listando sucursales", __CLASS__);
		
		$criteria = new SucursalCriteria();
		
		$entities = $service->getList( $criteria );
		
		foreach ($entities as $entity) {
			
			$this->log("Sucursal: " . $entity, __CLASS__);
			
		}
		
	}
}
?>