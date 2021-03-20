<?php

namespace Lpnklf\Core\Test\categorias;

use Lpnklf\Core\model\CategoriaProducto;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;
use Lpnklf\Core\criteria\CajaCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCategoriaProductoTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getCategoriaProductoService();
		
		\Logger::getLogger(__CLASS__)->info("agregando CategoriaProducto");		
		
		$cp = new CategoriaProducto();
		$cp->setNombre("RUBRO GENERAL");
		$service->add( $cp );
		
		
	}
}
?>