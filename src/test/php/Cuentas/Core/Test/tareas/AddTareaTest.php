<?php

namespace Lpnklf\Core\Test\tareas;

use Lpnklf\Core\model\Tarea;

use Lpnklf\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lpnklf\Core\service\ServiceFactory;

include_once dirname(__DIR__). '/conf/init.php';

class AddTareaTest extends GenericTest{
	
	
	public function test(){

		
		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");
		
		$service = ServiceFactory::getTareaService();
		
		\Logger::getLogger(__CLASS__)->info("agregando Tarea");		
		
		$tarea = new Tarea();
		$tarea->setTitulo("Rejas Javier");
		$tarea->setObservaciones("Llevar las rejas a Javier para armar las de las ventanas");
		$tarea->setFechaHora( new \DateTime() );
		$service->add( $tarea );
		
		
	}
}
?>