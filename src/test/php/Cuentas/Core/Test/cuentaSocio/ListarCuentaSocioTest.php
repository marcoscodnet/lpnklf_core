<?php

namespace Lpnklf\Core\Test\cuentaSocios;

include_once dirname(__DIR__). '/conf/init.php';

use Lpnklf\Core\Test\GenericTest;
use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\CuentaSocioCriteria;

use Cose\Security\service\SecurityContext;

class ListCuentaSocioTest extends GenericTest{
	
	/**
	 */
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getCuentaSocioService();
		
		$this->log("listando cuentaSocios", __CLASS__);
		
		$criteria = new CuentaSocioCriteria();
		$criteria->setMaxResult(5);
		//$criteria->setNombre("Ber");
		
		$cuentaSocios = $service->getList( $criteria );
		
		foreach ($cuentaSocios as $cuentaSocio) {
			
			$this->log("CuentaSocio: " . $cuentaSocio, __CLASS__);
			
		}
		
	}
}
?>