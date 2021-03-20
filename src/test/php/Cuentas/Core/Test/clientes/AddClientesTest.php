<?php

namespace Lpnklf\Core\Test\clientes;

use Lpnklf\Core\model\Cliente;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\ClienteCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddClientesTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getClienteService();
		
		\Logger::getLogger(__CLASS__)->info("agregando cliente");		
		
		$cliente = new Cliente();
		$cliente->setNombre("CLIENTE MOSTRADOR");
		$cliente->setApellido("");
		$service->add( $cliente );
		
		
	}
}
?>