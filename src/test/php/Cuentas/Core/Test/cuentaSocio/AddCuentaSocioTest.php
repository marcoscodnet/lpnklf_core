<?php

namespace Lpnklf\Core\Test\cuentaSocios;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\model\CuentaSocio;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\CuentaSocioCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCuentaSociosTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getCuentaSocioService();
		
		\Logger::getLogger(__CLASS__)->info("agregando cuentaSocio");		
		
		$cuentaSocio = new CuentaSocio();
		$cuentaSocio->setNombre("Marcos");
		$cuentaSocio->setNumero("1");
		$cuentaSocio->setFecha( new \Datetime() );
		$cuentaSocio->setSaldoInicial( 0 );
		$service->add( $cuentaSocio );
		
		$cuentaSocio = new CuentaSocio();
		$cuentaSocio->setNombre("Hernán");
		$cuentaSocio->setNumero("2");
		$cuentaSocio->setFecha( new \Datetime() );
		$cuentaSocio->setSaldoInicial( 0 );
		$service->add( $cuentaSocio );
		
	}
}
?>