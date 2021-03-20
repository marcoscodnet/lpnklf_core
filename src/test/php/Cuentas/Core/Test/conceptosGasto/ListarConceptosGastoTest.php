<?php

namespace Lpnklf\Core\Test\conceptosGasto;

use Lpnklf\Core\criteria\ConceptoGastoCriteria;

include_once dirname(__DIR__). '/conf/init.php';

use Lpnklf\Core\Test\GenericTest;
use Lpnklf\Core\service\ServiceFactory;

use Cose\Security\service\SecurityContext;

class ListConceptosGastoTest extends GenericTest{
	
	/**
	 * @Security( permission="listar_conceptosGasto" )
	 */
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getConceptoGastoService();
		
		$this->log("listando conceptos de gasto", __CLASS__);
		
		$criteria = new ConceptoGastoCriteria();
		
		$criteria->addOrder("nombre", "ASC");
		
		$entities = $service->getList( $criteria );
		
		foreach ($entities as $entity) {
			
			$this->log("Concepto gasto: " . $entity, __CLASS__);
			
		}
		
	}
}
?>