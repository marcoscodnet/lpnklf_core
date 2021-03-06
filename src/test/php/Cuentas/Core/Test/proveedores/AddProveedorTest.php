<?php

namespace Lpnklf\Core\Test\proveedores;

use Lpnklf\Core\model\Proveedor;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\ProveedorCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddProveedorTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getProveedorService();
		
		\Logger::getLogger(__CLASS__)->info("agregando Proveedor");		
		
		$proveedor = new Proveedor();
		$proveedor->setNombre("LOTERÍAS");
		//$proveedor->setApellido("LOTERÍAS");
		$proveedor->setRazonSocial("Lotería y Casinos de la Pcia de Bs As");
		$proveedor->setFechaAlta( new \DateTime() );
		$service->add( $proveedor );
		
		
	}
}
?>