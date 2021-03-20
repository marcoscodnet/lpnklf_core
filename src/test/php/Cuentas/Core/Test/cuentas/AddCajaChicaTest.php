<?php

namespace Lpnklf\Core\Test\cajas;

use Lpnklf\Core\model\CajaChica;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\model\Caja;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\CajaCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCajasTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getCajaChicaService();
		
		\Logger::getLogger(__CLASS__)->info("agregando caja chica");		
		
		$caja = new CajaChica();
		$caja->setNumero("1");
		$caja->setFecha( new \Datetime() );
		$caja->setSaldoInicial( 0 );
		$caja->setSaldo( 0 );
		$service->add( $caja );
		
		
	}
}
?>