<?php

namespace Lpnklf\Core\Test\gastos;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\model\EstadoGasto;

use Lpnklf\Core\model\Gasto;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\GastoCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddGastoTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getSucursalService();
		
		\Logger::getLogger(__CLASS__)->info("agregando Gasto");		
		
		$gasto = new Gasto();
		$gasto->setEstado(EstadoGasto::Realizado);
		$gasto->setFechaHora( new \Datetime() );
		$gasto->setMonto(380);
		
		$gasto->setVendedor( LpnklfUtils::getEmpleadoDefault() );

		$gasto->setUser(LpnklfUtils::getUserByUsername("bernardo"));
		$gasto->setConcepto( LpnklfUtils::getConceptoGastoVarios() );
		
		$service->add( $gasto );
		
		
	}
}
?>